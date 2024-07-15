<?php

namespace App\EntityListener;


use App\Entity\Brief;
use App\Entity\BusinessModel;
use App\Entity\Project;
use App\Repository\BriefRepository;
use App\Repository\BusinessModelRepository;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class BriefListener
{
    private BusinessModelRepository $businessModelRepo;

    public function __construct(
        private TokenStorageInterface $tokenStorage,
        private EntityManagerInterface $entityManager,
        BusinessModelRepository $businessModelRepo
    ) {
        $this->businessModelRepo = $businessModelRepo;
    }

    #[NoReturn]
    public function prePersist(Brief $brief) :void {

        $currentUser = $this->tokenStorage->getToken()->getUser();
        $brief->setUser($currentUser);
        $brief->setCreatedAt(new \DateTimeImmutable());

        $project = new Project();
        $project->setName('Projet:'. $brief->getName());
        $project->setCreatedAt(new \DateTimeImmutable());


        $this->entityManager->persist($project);
        $this->entityManager->flush();

        $businessModelId = $brief->getBusinessModelId();


        $businessModel = $this->businessModelRepo->findOneBy(['id' => $businessModelId]);


        $brief->setBusinessModel($businessModel);
        $brief->setProject($project);



    }
}