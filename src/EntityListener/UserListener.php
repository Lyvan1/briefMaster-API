<?php

namespace App\EntityListener;

use App\Entity\User;
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
    public function prePersist(User $user, PrePersistEventArgs $event): void{
        $user->setPassword($this->passwordHasher->hashPassword($user,$user->getPassword()));
    }
}