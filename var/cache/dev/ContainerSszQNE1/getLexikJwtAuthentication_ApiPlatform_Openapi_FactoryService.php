<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLexikJwtAuthentication_ApiPlatform_Openapi_FactoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'lexik_jwt_authentication.api_platform.openapi.factory' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\OpenApi\OpenApiFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/OpenApi/Factory/OpenApiFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/OpenApi/OpenApiFactory.php';
        include_once \dirname(__DIR__, 4).'/src/OpenApi/OpenApiFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/OpenApi/Serializer/NormalizeOperationNameTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/OpenApi/Factory/OpenApiFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/Pagination/PaginationOptions.php';

        return $container->privates['lexik_jwt_authentication.api_platform.openapi.factory'] = new \Lexik\Bundle\JWTAuthenticationBundle\OpenApi\OpenApiFactory(new \App\OpenApi\OpenApiFactory(new \ApiPlatform\OpenApi\Factory\OpenApiFactory(($container->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService($container)), ($container->privates['api_platform.metadata.resource.metadata_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_MetadataCollectionFactory_CachedService($container)), ($container->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService($container)), ($container->privates['api_platform.metadata.property.metadata_factory.cached'] ?? self::getApiPlatform_Metadata_Property_MetadataFactory_CachedService($container)), ($container->privates['api_platform.json_schema.backward_compatible_schema_factory'] ?? $container->load('getApiPlatform_JsonSchema_BackwardCompatibleSchemaFactoryService')), ($container->privates['api_platform.json_schema.type_factory'] ?? $container->load('getApiPlatform_JsonSchema_TypeFactoryService')), ($container->privates['api_platform.filter_locator'] ?? self::getApiPlatform_FilterLocatorService($container)), $container->parameters['api_platform.formats'], ($container->privates['api_platform.openapi.options'] ?? $container->load('getApiPlatform_Openapi_OptionsService')), new \ApiPlatform\State\Pagination\PaginationOptions(true, 'page', false, 'itemsPerPage', false, 'pagination', 15, NULL, false, false, 'partial'), ($container->privates['api_platform.router'] ?? self::getApiPlatform_RouterService($container)))), '/briefApi/login_check', 'email', 'password');
    }
}
