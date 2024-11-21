<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTestMailControllerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\TestMailController' shared autowired service.
     *
     * @return \App\Controller\TestMailController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/TestMailController.php';

        $container->services['App\\Controller\\TestMailController'] = $instance = new \App\Controller\TestMailController();

        $instance->setContainer(($container->privates['.service_locator.jUv.zyj'] ?? $container->load('get_ServiceLocator_JUv_ZyjService'))->withContext('App\\Controller\\TestMailController', $container));

        return $instance;
    }
}
