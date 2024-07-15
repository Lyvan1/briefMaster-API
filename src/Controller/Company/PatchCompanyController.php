<?php

namespace App\Controller\Company;

use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Vich\UploaderBundle\Handler\UploadHandler;

class PatchCompanyController extends AbstractController
{
    #[Route('/briefApi/companies/{id}', name: 'app_patch_company')]
    public function index(LoggerInterface $logger, $id, Request $request, CompanyRepository $companyRepo, SerializerInterface $serializer, EntityManagerInterface $entityManager, UploadHandler $uploadHandler): Response
    {
        $properties = ['name', 'zipcode', 'city', 'address', 'companyRegistrationNumber', 'country', 'vatNumber ', 'users', 'roles', 'logoFile'];
        $company = $companyRepo->findOneBy(['id' => $id]);

        if (empty($company)) {
            return new JsonResponse(['message' => 'Company not found'], Response::HTTP_NOT_FOUND);
        }

        $payload = $request->getPayload();

        foreach ($payload as $property => $value) {

            if (in_array($property, $properties)) {

                $setter = 'set' . ucfirst($property);
                $company->$setter($value);
            } else {
                return new Response('This property does not exist.', Response::HTTP_BAD_REQUEST);
            }
        }

        if ($request->files->get('logoFile')) {
            $logoFile = $request->files->get('logoFile');

            $fileToRemove = $company->getLogoUrl();

            if ($fileToRemove) {
                $path = $this->getParameter('logos_directory') . $fileToRemove;

                unlink($path);
            }
            $company->setLogoFile($logoFile);

            /*utilise le gestionnaire de téléchargement de VichUploaderBundle pour gérer le processus de téléchargement
            du fichier spécifié dans l'entité Company*/
            $uploadHandler->upload($company, 'logoFile');

            $company->setLogoUrl('/images/company_logos/' . $company->getLogo());
        }

        $entityManager->persist($company);
        $entityManager->flush();
        $companyJson = $serializer->serialize($company, 'json', ['groups' => 'read:Company:collection']);
        return new JsonResponse($companyJson, Response::HTTP_OK, [], true);
    }
}