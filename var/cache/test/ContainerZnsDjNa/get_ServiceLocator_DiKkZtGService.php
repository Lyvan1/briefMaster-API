<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_DiKkZtGService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.service_locator.DiKkZtG' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.DiKkZtG'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'businessModelRepo' => ['privates', 'App\\Repository\\BusinessModelRepository', 'getBusinessModelRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'iriConverter' => ['privates', 'api_platform.symfony.iri_converter', 'getApiPlatform_Symfony_IriConverterService', false],
            'serializer' => ['privates', 'serializer', 'getSerializerService', false],
            'validator' => ['privates', 'validator', 'getValidatorService', false],
        ], [
            'businessModelRepo' => 'App\\Repository\\BusinessModelRepository',
            'entityManager' => '?',
            'iriConverter' => '?',
            'serializer' => '?',
            'validator' => '?',
        ]);
    }
}
