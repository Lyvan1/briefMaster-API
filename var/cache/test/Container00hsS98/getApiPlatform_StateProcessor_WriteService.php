<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProcessor_WriteService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.state_processor.write' shared service.
     *
     * @return \ApiPlatform\State\Processor\WriteProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/Processor/WriteProcessor.php';

        return $container->privates['api_platform.state_processor.write'] = new \ApiPlatform\State\Processor\WriteProcessor(($container->privates['api_platform.state_processor.serialize'] ?? $container->load('getApiPlatform_StateProcessor_SerializeService')), ($container->privates['api_platform.state_processor.locator'] ?? $container->load('getApiPlatform_StateProcessor_LocatorService')));
    }
}
