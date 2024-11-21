<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_RouteLoaderService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.route_loader' shared service.
     *
     * @return \ApiPlatform\Symfony\Routing\ApiLoader
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/LoaderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/Loader.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Routing/ApiLoader.php';

        return $container->privates['api_platform.route_loader'] = new \ApiPlatform\Symfony\Routing\ApiLoader(($container->services['kernel'] ?? $container->get('kernel', 1)), ($container->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService($container)), ($container->privates['api_platform.metadata.resource.metadata_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_MetadataCollectionFactory_CachedService($container)), $container, $container->parameters['api_platform.formats'], $container->parameters['api_platform.resource_class_directories'], false, true, true, false, false, NULL);
    }
}
