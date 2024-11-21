<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_ArgumentResolver_PayloadService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.argument_resolver.payload' shared service.
     *
     * @return \ApiPlatform\Symfony\Bundle\ArgumentResolver\PayloadArgumentResolver
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Controller/ValueResolverInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Bundle/ArgumentResolver/CompatibleValueResolverInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Bundle/ArgumentResolver/PayloadArgumentResolver.php';

        return $container->privates['api_platform.argument_resolver.payload'] = new \ApiPlatform\Symfony\Bundle\ArgumentResolver\PayloadArgumentResolver(($container->privates['api_platform.metadata.resource.metadata_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_MetadataCollectionFactory_CachedService($container)), ($container->privates['api_platform.serializer.context_builder.filter'] ?? self::getApiPlatform_Serializer_ContextBuilder_FilterService($container)));
    }
}
