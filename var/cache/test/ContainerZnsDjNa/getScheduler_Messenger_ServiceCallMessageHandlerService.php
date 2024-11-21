<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getScheduler_Messenger_ServiceCallMessageHandlerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'scheduler.messenger.service_call_message_handler' shared service.
     *
     * @return \Symfony\Component\Scheduler\Messenger\ServiceCallMessageHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/scheduler/Messenger/ServiceCallMessageHandler.php';

        return $container->privates['scheduler.messenger.service_call_message_handler'] = new \Symfony\Component\Scheduler\Messenger\ServiceCallMessageHandler(($container->privates['.service_locator.Xbsa8iG'] ??= new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [], [])));
    }
}
