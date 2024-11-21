<?php

namespace App\Controller\User;

use App\Repository\UserRepository;
use App\Service\MailUpdatePassword;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use ApiPlatform\Validator\ValidatorInterface;
use Vich\UploaderBundle\Handler\UploadHandler;

class PatchUserController extends AbstractController
{

    public function __construct(private ValidatorInterface $validator, private UserPasswordHasherInterface $passwordHasher,)
    {
    }

    private function generatePassword($length = 12)
    {
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';
        $specialCharacters = '@$!%*?&/';
        $allCharacters = $lowercase . $uppercase . $digits . $specialCharacters;

        // Assurer qu'au moins un caractère de chaque catégorie est présent
        $password = '';
        $password .= $lowercase[random_int(0, strlen($lowercase) - 1)];
        $password .= $uppercase[random_int(0, strlen($uppercase) - 1)];
        $password .= $digits[random_int(0, strlen($digits) - 1)];
        $password .= $specialCharacters[random_int(0, strlen($specialCharacters) - 1)];

        // Remplir le reste du mot de passe avec des caractères aléatoires
        for ($i = 4; $i < $length; $i++) {
            $password .= $allCharacters[random_int(0, strlen($allCharacters) - 1)];
        }

        // Mélanger le mot de passe pour éviter que les premiers caractères soient toujours les mêmes types
        return str_shuffle($password);
    }


    #[Route('/briefApi/users/{id}', name: 'app_patch_user')]
    public function index(MailUpdatePassword $mailService, LoggerInterface $logger, $id, Request $request, UserRepository $userRepo, SerializerInterface $serializer, EntityManagerInterface $entityManager, UploadHandler $uploadHandler): Response
    {
        $properties = ['firstname', 'lastname', 'email', 'password', 'roles', 'avatarFile'];
        $user = $userRepo->findOneBy(['id' => $id]);

        if (empty($user)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $payload = $request->getPayload();

        foreach ($payload as $property => $value) {

            if (in_array($property, $properties)) {
                $setter = 'set' . ucfirst($property);
               /* if ($property === 'password') {
                    // hasher le mot de passe ici
                    $value = password_hash($value, PASSWORD_BCRYPT);
                }*/

                if ($property === 'password' && filter_var($payload->get('password'), FILTER_VALIDATE_BOOLEAN)) {
                    $generatedPassword = $this->generatePassword();
                    $value = $this->passwordHasher->hashPassword($user, $generatedPassword);
                    //$user->setPassword($hashedPassword);

                   // Envoyer l'email avec le mot de passe généré
                    try {
                        $mailService->sendPasswordChangedEmail($user, $generatedPassword);
                    } catch (TransportExceptionInterface $exception) {
                        $logger->error('Failed to send password changed email: ' . $exception->getMessage());
                        return new JsonResponse(['message' => 'User updated but failed to send email.'], Response::HTTP_INTERNAL_SERVER_ERROR);
                    } catch (\Exception $exception) {
                        return new JsonResponse(['message' => 'An error occurred while sending the email: ' . $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
                    }

                    //return new JsonResponse(['generated_password' => $generatedPassword], Response::HTTP_OK);
                }
                $user->$setter($value);
            } else {
                return new Response('This property does not exist.', Response::HTTP_BAD_REQUEST);
            }
        }

        foreach ($payload as $property => $value) {
            $violations = $this->validator->validate($user, [$property]);
            if ($violations && count($violations) > 0) {
                foreach ($violations as $violation) {
                    $propertyPath = $violation->getPropertyPath();
                    $violationMessage = $violation->getMessage();

                    if (!isset($errors[$propertyPath])) {
                        $errors[$propertyPath] = [];
                    }
                    $errors[$propertyPath][] = $violationMessage;
                }
            }
        }

        // Si des erreurs existent, renvoyez-les
        if (!empty($errors)) {
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }


        if ($request->files->get('avatarFile')) {
            $avatarFile = $request->files->get('avatarFile');

            $fileToRemove = $user->getAvatarUrl();

            if ($fileToRemove) {

                $path = $this->getParameter('logos_directory') . $fileToRemove;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $user->setAvatarFile($avatarFile);

            // Gérer le téléchargement du fichier via VichUploaderBundle
            $uploadHandler->upload($user, 'avatarFile');

            $user->setAvatarUrl('/images/user_avatar/' . $user->getAvatar());
        }



        $entityManager->persist($user);
        $entityManager->flush();

        $userJson = $serializer->serialize($user, 'json', ['groups' => 'read:User:collection']);
        return new JsonResponse($userJson, Response::HTTP_OK, [], true);
    }

    #[Route('/my-page', name: 'my_page')]
    public function test(): Response
    {
        return $this->render('password_changed.html.twig', [
            'variable' => 'value',
        ]);
    }
}
