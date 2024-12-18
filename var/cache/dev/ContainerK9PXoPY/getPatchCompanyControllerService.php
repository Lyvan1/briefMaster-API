<?php

namespace ContainerK9PXoPY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPatchCompanyControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\Company\PatchCompanyController' shared autowired service.
     *
     * @return \App\Controller\Company\PatchCompanyController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/Company/PatchCompanyController.php';

        $container->services['App\\Controller\\Company\\PatchCompanyController'] = $instance = new \App\Controller\Company\PatchCompanyController(($container->privates['api_platform.validator'] ?? $container->load('getApiPlatform_ValidatorService')));

        $instance->setContainer(($container->privates['.service_locator.jUv.zyj'] ?? $container->load('get_ServiceLocator_JUv_ZyjService'))->withContext('App\\Controller\\Company\\PatchCompanyController', $container));

        return $instance;
    }
}
