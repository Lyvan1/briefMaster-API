<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPatchUserControllerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\User\PatchUserController' shared autowired service.
     *
     * @return \App\Controller\User\PatchUserController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/User/PatchUserController.php';

        $container->services['App\\Controller\\User\\PatchUserController'] = $instance = new \App\Controller\User\PatchUserController(($container->privates['api_platform.validator'] ?? $container->load('getApiPlatform_ValidatorService')), ($container->privates['security.user_password_hasher'] ?? $container->load('getSecurity_UserPasswordHasherService')));

        $instance->setContainer(($container->privates['.service_locator.jUv.zyj'] ?? $container->load('get_ServiceLocator_JUv_ZyjService'))->withContext('App\\Controller\\User\\PatchUserController', $container));

        return $instance;
    }
}
