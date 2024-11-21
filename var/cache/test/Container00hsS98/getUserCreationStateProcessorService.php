<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserCreationStateProcessorService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\State\UserCreationStateProcessor' shared autowired service.
     *
     * @return \App\State\UserCreationStateProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/src/State/UserCreationStateProcessor.php';

        $a = ($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container));

        if (isset($container->privates['App\\State\\UserCreationStateProcessor'])) {
            return $container->privates['App\\State\\UserCreationStateProcessor'];
        }

        return $container->privates['App\\State\\UserCreationStateProcessor'] = new \App\State\UserCreationStateProcessor(($container->privates['api_platform.doctrine.orm.state.persist_processor'] ?? $container->load('getApiPlatform_Doctrine_Orm_State_PersistProcessorService')), ($container->privates['security.user_password_hasher'] ?? $container->load('getSecurity_UserPasswordHasherService')), ($container->privates['api_platform.symfony.iri_converter'] ?? self::getApiPlatform_Symfony_IriConverterService($container)), $a);
    }
}
