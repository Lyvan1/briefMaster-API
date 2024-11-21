<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProvider_AccessChecker_PostDeserializeService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.state_provider.access_checker.post_deserialize' shared service.
     *
     * @return \ApiPlatform\Symfony\Security\State\AccessCheckerProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Security/State/AccessCheckerProvider.php';

        return $container->privates['api_platform.state_provider.access_checker.post_deserialize'] = new \ApiPlatform\Symfony\Security\State\AccessCheckerProvider(($container->privates['api_platform.state_provider.access_checker.post_deserialize.inner'] ?? $container->load('getApiPlatform_StateProvider_AccessChecker_PostDeserialize_InnerService')), ($container->privates['api_platform.security.resource_access_checker'] ?? self::getApiPlatform_Security_ResourceAccessCheckerService($container)), 'post_denormalize');
    }
}
