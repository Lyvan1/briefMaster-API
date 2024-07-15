<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationInterface;


class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    protected ?ConstraintViolationInterface $violation = null;
    private array $errorsArray= [];
    private array $payload;


    protected function getPayload(Request $request): self
    {
        $this->payload = json_decode($request->getContent(), true);

        return $this;
    }

    protected function get(string $key, bool $nullable = false): mixed
    {
        if (false === isset($this->payload[$key]) && false === $nullable) {
            //throw new \DomainException(sprintf('property "%s" is missing', $key));

            // Créer une ConstraintViolation afin de pouvoir l'ajouter au tableau d'erreur lors de la validation de l'entité
           $violation = new ConstraintViolation(
               $key.' property is missing',
               null,
               [],
               null,
               $key,
               null,
               null,
               null,
               null,
               null
           );
           $this->errorsArray[] = $violation;
        }

        return $this->payload[$key] ?? null;
    }

    protected function getViolations(): ?array
    {
        return $this->errorsArray;
    }
}