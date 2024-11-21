<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Hydra_Processor_LinkService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.hydra.processor.link' shared service.
     *
     * @return \ApiPlatform\Hydra\State\HydraLinkProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Hydra/State/HydraLinkProcessor.php';

        return $container->privates['api_platform.hydra.processor.link'] = new \ApiPlatform\Hydra\State\HydraLinkProcessor(($container->privates['api_platform.http_cache.processor.add_headers'] ?? $container->load('getApiPlatform_HttpCache_Processor_AddHeadersService')), ($container->privates['api_platform.router'] ?? self::getApiPlatform_RouterService($container)));
    }
}