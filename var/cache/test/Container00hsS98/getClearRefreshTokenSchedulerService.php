<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getClearRefreshTokenSchedulerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Scheduler\ClearRefreshTokenScheduler' shared autowired service.
     *
     * @return \App\Scheduler\ClearRefreshTokenScheduler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/scheduler/ScheduleProviderInterface.php';
        include_once \dirname(__DIR__, 4).'/src/Scheduler/ClearRefreshTokenScheduler.php';

        return $container->privates['App\\Scheduler\\ClearRefreshTokenScheduler'] = new \App\Scheduler\ClearRefreshTokenScheduler();
    }
}