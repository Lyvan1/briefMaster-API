<?php

namespace ContainerK9PXoPY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_SchedulerDebugService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.scheduler_debug' shared service.
     *
     * @return \Symfony\Component\Scheduler\Command\DebugCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/scheduler/Command/DebugCommand.php';

        $container->privates['console.command.scheduler_debug'] = $instance = new \Symfony\Component\Scheduler\Command\DebugCommand(($container->privates['.service_locator.QuhhJxU'] ?? $container->load('get_ServiceLocator_QuhhJxUService')));

        $instance->setName('debug:scheduler');
        $instance->setDescription('List schedules and their recurring messages');

        return $instance;
    }
}
