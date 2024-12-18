<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProvider_AccessChecker_PostDeserialize_InnerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.state_provider.access_checker.post_deserialize.inner' shared service.
     *
     * @return \ApiPlatform\State\Provider\DeserializeProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/Provider/DeserializeProvider.php';

        return $container->privates['api_platform.state_provider.access_checker.post_deserialize.inner'] = new \ApiPlatform\State\Provider\DeserializeProvider(($container->privates['api_platform.state_provider.access_checker'] ?? $container->load('getApiPlatform_StateProvider_AccessCheckerService')), ($container->privates['serializer'] ?? self::getSerializerService($container)), ($container->privates['api_platform.serializer.context_builder.filter'] ?? self::getApiPlatform_Serializer_ContextBuilder_FilterService($container)), NULL);
    }
}
