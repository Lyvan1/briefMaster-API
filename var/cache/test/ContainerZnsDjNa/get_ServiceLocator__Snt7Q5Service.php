<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator__Snt7Q5Service extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.service_locator..snt7Q5' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator..snt7Q5'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\BriefController::createBrief' => ['privates', '.service_locator.DiKkZtG', 'get_ServiceLocator_DiKkZtGService', true],
            'App\\Controller\\CallMessageClearRefreshTokenController::sendMessage' => ['privates', '.service_locator.y_RkHh0', 'get_ServiceLocator_YRkHh0Service', true],
            'App\\Controller\\Company\\PatchCompanyController::index' => ['privates', '.service_locator.YEtl_1y', 'get_ServiceLocator_YEtl1yService', true],
            'App\\Controller\\User\\PatchUserController::index' => ['privates', '.service_locator.l8PeLb.', 'get_ServiceLocator_L8PeLb_Service', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\BriefController:createBrief' => ['privates', '.service_locator.DiKkZtG', 'get_ServiceLocator_DiKkZtGService', true],
            'App\\Controller\\CallMessageClearRefreshTokenController:sendMessage' => ['privates', '.service_locator.y_RkHh0', 'get_ServiceLocator_YRkHh0Service', true],
            'App\\Controller\\Company\\PatchCompanyController:index' => ['privates', '.service_locator.YEtl_1y', 'get_ServiceLocator_YEtl1yService', true],
            'App\\Controller\\User\\PatchUserController:index' => ['privates', '.service_locator.l8PeLb.', 'get_ServiceLocator_L8PeLb_Service', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\BriefController::createBrief' => '?',
            'App\\Controller\\CallMessageClearRefreshTokenController::sendMessage' => '?',
            'App\\Controller\\Company\\PatchCompanyController::index' => '?',
            'App\\Controller\\User\\PatchUserController::index' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\BriefController:createBrief' => '?',
            'App\\Controller\\CallMessageClearRefreshTokenController:sendMessage' => '?',
            'App\\Controller\\Company\\PatchCompanyController:index' => '?',
            'App\\Controller\\User\\PatchUserController:index' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
