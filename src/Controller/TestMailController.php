<?php
// src/Controller/TestMailController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestMailController extends AbstractController
{
    #[Route('/testMail', name: 'test_mail')]
    public function index(): Response
    {
        // Passer des variables au template si nécessaire
        $user = [
            'firstname' => 'John Doe',
            'email' => 'johndoe@example.com',
        ];

        $generatedPassword = 'Abc123$#';

        return $this->render('emails/password_changed.html.twig', [
            'user' => $user,
            'generatedPassword' => $generatedPassword,
        ]);
    }
}
