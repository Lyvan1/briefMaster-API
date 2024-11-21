<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoggedUserController extends AbstractController
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/logged', name: 'app_logged_user', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        // Récupérer l'utilisateur connecté
        $user = $this->security->getUser();

        // Vérifiez si un utilisateur est connecté
        if (!$user) {
            return $this->json(['message' => 'No user is currently logged in.'], 401);
        }

        // Retourner les informations de l'utilisateur en réponse JSON
        return $this->json([
            'id' => '/briefApi/users/' . $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            // Ajoutez d'autres informations de l'utilisateur si nécessaire
        ]);
    }
}
