<?php

namespace App\OpenApi;

use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\OpenApi;

class OpenApiFactory implements OpenApiFactoryInterface
{

    public function __construct(private OpenApiFactoryInterface $decorated)
    {
    }

    public function __invoke(array $context = []): OpenApi
    {
        // Appel de la méthode de génération OpenAPI de la classe décorée.
        $openApi = $this->decorated->__invoke($context);


//dd($test);

        // Retourne la spécification OpenAPI.
        return $openApi;

    }


}