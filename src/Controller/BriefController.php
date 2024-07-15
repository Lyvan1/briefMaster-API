<?php

namespace App\Controller;

use ApiPlatform\Api\IriConverterInterface;
use App\Entity\Brief;
use App\Entity\Project;
use App\Repository\BusinessModelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class BriefController extends AbstractController
{

    #[Route('/briefApi/brieves', name: 'app_brief', methods: ['POST'])]
    public function createBrief(SerializerInterface $serializer, Request $request, BusinessModelRepository $businessModelRepo, validatorInterface $validator, EntityManagerInterface $entityManager, IriConverterInterface $iriConverter): JsonResponse
    {

//      Si l'utilisateur n'est pas connecté
        if($this->getUser() == null ){
            return $this->json(['statut' => 403, 'message' => 'You must be logged in.'], Response::HTTP_FORBIDDEN);
        }

        $payload = $this->getPayload($request);
        $brief = new Brief();

        $brief->setCreatedAt(new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris')));
        $brief->setName($payload->get('name'));
        $brief->setIsSigned(false);
        $brief->setLandingPageUrl($payload->get('landingPageUrl',true));
        $brief->setIsGeolocated($payload->get('isGeolocated',true) ? $payload->get('isGeolocated') : false);


        if($payload->get('isGeolocated', true)){
            $brief->setGeolocatedContext($payload->get('geolocatedContext'));
        }

        $brief->setTotalBudget($payload->get('totalBudget') ? $payload->get('totalBudget') : 0);
        $brief->setVolume($payload->get('volume') ? $payload->get('volume') : 0);
        $brief->setUser($this->getUser());


        // Récupération du businessModel en BDD grâce à l'id fournit par l'utilisateur
        $businessModelId = $payload->get('businessModelId');
        $brief->setBusinessModelId($businessModelId);
        if($businessModelId !== null){
            // Récupération grâce au repository associé
            $businessModel = $businessModelRepo->find($businessModelId);

//            $iriBusinessModel = $iriConverter->getIriFromResource($businessModel);
//            $businessModelRessource = $iriConverter->getResourceFromIri($iriBusinessModel);

            $brief->setBusinessModel($businessModel);
        }
//        $businessModel instanceof BusinessModel ?  dd($businessModel, $businessModelRessource) : dd('nothig');



        //initialisation du tableau d'erreurs qui contiendra les erreurs liées à la validation de $brief
        $errors = $validator->validate($brief);

        //Récupérations des erreurs liée aux propriétés manquante du payload (custom abstract controller)
        if(count($this->getViolations()) > 0){
            foreach($this->getViolations() as $error){
                $errors->add($error);
            }

        }

        //Vérification du tableau d'erreurs lors de la validation de $brief
        if(count($errors) > 0){
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        //Initialisation d'un project
        $project = new Project(
            'Projet : '.$payload->get('name').' - '.$this->getUser()->getCompany()->getName()
        );

        $brief->setProject($project);

        $entityManager->persist($project);
        $entityManager->persist($brief);
        $entityManager->flush();

        $jsonld = $serializer->serialize($brief, 'json',['groups' => 'read:Brief:item']);
        return new JsonResponse($jsonld, Response::HTTP_CREATED, ['Accept' => 'application/json'], true);
    }
}
