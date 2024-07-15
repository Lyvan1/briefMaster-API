<?php

namespace App\EntityListener;

use App\Entity\UserOld;
use Doctrine\ORM\Event\PrePersistEventArgs;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserListener
{
    private $passwordHasher;
    private $datapersister;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    #[NoReturn]
    public function prePersist(UserOld $user, PrePersistEventArgs $event): void{
        $user->setPassword($this->passwordHasher->hashPassword($user,$user->getPassword()));
    }
}