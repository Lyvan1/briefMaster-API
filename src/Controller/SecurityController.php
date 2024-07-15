<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SecurityController extends AbstractController
{
    #[Route('/briefApi/login_check', name: 'app_security')]
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->json([
            'email' => $user->getUserIdentifier()
        ]);
        // voir Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler
    }
}
