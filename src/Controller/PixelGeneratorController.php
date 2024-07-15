<?php

namespace App\Controller;

use App\Entity\Project;
use App\Services\TrackingPixelGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class PixelGeneratorController extends AbstractController
{
    public array $violations =[];
    private const PIXEL_IMG = 'img';
    private const PIXEL_IFRAME = 'iframe';
    private const PIXEL_S2S = 's2s';

    private const TYPES_PIXEL = [
        self::PIXEL_IMG,
        self::PIXEL_IFRAME,
        self::PIXEL_S2S
    ];

    public function __construct(private ValidatorInterface $validator, private TrackingPixelGenerator $pixelGenerator)
    {

    }

    #[Route('/generatePixel', name: 'app_pixel_generator', methods: ['POST'])]
    public function generatePixel(Request $request)
    {

        $payload = $this->getPayload($request);
        $pixelType = $payload->get('pixelType');
        $offerNumber = $payload->get('offerNumber');
        $eventType = $payload->get('eventType');
        $trackingParameter = $payload->get('trackingParameter');


        // Récupération des erreurs dans le custom abstract controller. s'il manque par exemple une des variables requises
        if(count($this->getViolations()) > 0){
            foreach($this->getViolations() as $error){
                $violations[] = $error->getMessage();
            }
            return $this->json(['message' => $violations],Response::HTTP_BAD_REQUEST);
        }

        //contrainte pour le type de pixel
        if(in_array($pixelType,self::TYPES_PIXEL) === false){
            $violations[] = ['propertyPath' => 'pixelType','message' => $pixelType.' does not exist.'];
            //return $this->json(['message' => $pixelType.' does not exist.'],Response::HTTP_BAD_REQUEST);
        }

        // contrainte pour le type d'event
        if($eventType < 1 || $eventType > 15){
            $violations[] = ['propertyPath' => 'eventType','message' =>'eventType number: '.$eventType.' does not exist.'];
            //return $this->json(['message' => 'eventType number: '.$eventType.' does not exist.'],Response::HTTP_BAD_REQUEST);
        }

        //s'il y a des erreurs liées aux valeurs reçus, pixelType ou eventType inexistant
        if(isset($violations) && count($violations) > 0){
            return $this->json($violations, Response::HTTP_BAD_REQUEST);
        }

        switch ($pixelType){
            case 'img':
                $pixel = $this->pixelGenerator->generateImgPixel($offerNumber, $eventType, $trackingParameter);
                break;
            case 'iframe':
                $pixel = $this->pixelGenerator->generateIframePixel($offerNumber, $eventType, $trackingParameter);
                break;
            case 's2s':
                $pixel = $this->pixelGenerator->generateS2SPixel($offerNumber, $eventType, $trackingParameter);
                break;
        }

        return new JsonResponse($pixel, Response::HTTP_OK, [], JSON_UNESCAPED_SLASHES);
    }
}
