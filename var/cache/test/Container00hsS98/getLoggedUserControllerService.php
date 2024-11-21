<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLoggedUserControllerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\LoggedUserController' shared autowired service.
     *
     * @return \App\Controller\LoggedUserController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/LoggedUserController.php';

        $container->services['App\\Controller\\LoggedUserController'] = $instance = new \App\Controller\LoggedUserController(($container->privates['security.helper'] ?? $container->load('getSecurity_HelperService')));

        $instance->setContainer(($container->privates['.service_locator.jUv.zyj'] ?? $container->load('get_ServiceLocator_JUv_ZyjService'))->withContext('App\\Controller\\LoggedUserController', $container));

        return $instance;
    }
}
