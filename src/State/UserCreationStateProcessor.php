<?php

namespace App\State;

use ApiPlatform\Api\IriConverterInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


final readonly class UserCreationStateProcessor implements ProcessorInterface
{

public function __construct(private ProcessorInterface $innerProcessor, private UserPasswordHasherInterface $passwordHasher, private IriConverterInterface $iriconverter, private EntityManagerInterface $entityManager)
{
}

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if($data instanceof User && $context['request']->getMethod() === 'POST' ){
            //Hasher le mot de passe
            $data->setPassword($this->passwordHasher->hashPassword($data,$data->getPassword()));
        }

        return $this->innerProcessor->process($data, $operation, $uriVariables, $context);
    }
}
