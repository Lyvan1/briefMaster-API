<?php

namespace App\Serializer;

use App\Entity\Company;
use App\Entity\User;
use App\Repository\CompanyRepository;
use App\Repository\UserRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Validator\Constraints\Image;
use Vich\UploaderBundle\Handler\DownloadHandler;
use Vich\UploaderBundle\Storage\StorageInterface;

class MediaObjectNormalizer implements NormalizerInterface
{

    private const ALREADY_CALLED = 'MEDIA_OBJECT_NORMALIZER_ALREADY_CALLED';

    public function __construct(
        #[Autowire(service: 'serializer.normalizer.object')]
        private readonly NormalizerInterface $normalizer,
        private readonly StorageInterface    $storage,
        private CompanyRepository            $companyRepo,
        private UserRepository               $userRepo,
        private EntityManagerInterface       $entityManager,
        private DownloadHandler              $downloadHandler
    )
    {
    }

    public function normalize($object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {

        $context[self::ALREADY_CALLED] = true;
        $class = get_class($object);

        if ($object instanceof Company) {

            if (isset($context['operation']) && $context['operation']->getMethod() === 'POST' && $object->getLogo() !== null) {
                $object->logoUrl = $this->storage->resolveUri($object, 'logoFile');
                $currentCompany = $this->companyRepo->find($object->getId());
                $currentCompany->setLogoUrl($this->storage->resolveUri($object, 'logoFile'));

                // Récupérer le fichier correspondant à l'image
                $imageFile = new File($this->storage->resolvePath($object, 'logoFile'));

                $this->entityManager->persist($currentCompany);
                $this->entityManager->flush();
            }
        } else if( $object instanceof User) {
            if (isset($context['operation']) && $context['operation']->getMethod() === 'POST' && $object->getAvatar() !== null) {
                $object->avatarUrl = $this->storage->resolveUri($object, 'avatarFile');

                $currentUser = $this->userRepo->find($object->getId());
                $currentUser->setAvatarUrl($this->storage->resolveUri($object, 'avatarFile'));

                $this->entityManager->persist($currentUser);
                $this->entityManager->flush();

            }
        }




        // Conversion de l'image en base 64 lors de l'envoi de la réponse API vers le front
        /*if ($object->getLogo() !== null) {
            $logoBase64 = base64_encode(file_get_contents('.' . $object->getLogoUrl()));
            $object->logoBase64 = $logoBase64;
        }*/

        return $this->normalizer->normalize($object, $format, $context);
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {

        if (isset($context[self::ALREADY_CALLED])) {
            return false;
        }


        return ($data instanceof Company ||  $data instanceof User);
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Company::class => true,
            User::class => true
        ];
    }


}