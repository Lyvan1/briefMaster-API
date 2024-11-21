<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getScheduler_EventListenerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'scheduler.event_listener' shared service.
     *
     * @return \Symfony\Component\Scheduler\EventListener\DispatchSchedulerEventListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/scheduler/EventListener/DispatchSchedulerEventListener.php';

        $a = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->privates['scheduler.event_listener'])) {
            return $container->privates['scheduler.event_listener'];
        }

        return $container->privates['scheduler.event_listener'] = new \Symfony\Component\Scheduler\EventListener\DispatchSchedulerEventListener(($container->privates['.service_locator.QuhhJxU'] ?? $container->load('get_ServiceLocator_QuhhJxUService')), $a);
    }
}
