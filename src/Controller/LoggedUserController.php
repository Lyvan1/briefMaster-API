<?php

namespace App\Controller;

use Symfony\Bundle\SecurityBundle\Security;

class LoggedUserController extends AbstractController
{

    public function __construct(private Security $security)
    {
    }

    #[Route('/logged', name: 'app_logged_user', methods: ['GET'])]
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
       return  $this->security->getUser();
    }

}