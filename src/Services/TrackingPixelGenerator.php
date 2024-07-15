<?php

namespace App\Services;

use App\Controller\AbstractController;

class TrackingPixelGenerator extends AbstractController
{
    public function generateImgPixel(int $offerNumber, int $eventType, string $trackingParameter): string{
        $baseUrl = 'https://track.oadstrack.com/?e=%s&o=%s&leadid={%s}';
        return stripslashes('<img src="'.sprintf($baseUrl,$eventType, $offerNumber, $trackingParameter).'" width="1" height="1">');

    }

    public function generateIframePixel(int $offerNumber, int $eventType, string $trackingParameter): string{
        $baseUrl = 'https://track.oadstrack.com/?e="%s"&o="%s"&leadid={"%s"}';
        return '<iframe src="'.sprintf($baseUrl,$eventType,$offerNumber,$trackingParameter).'" width="1" height="1"></iframe>';
    }

    public function generateS2SPixel(int $eventType, string $trackingParameter): string{
        return sprintf('https://track.oadstrack.com/?e="%s"&clickid={"%s"}',$eventType, $trackingParameter,);
    }
}