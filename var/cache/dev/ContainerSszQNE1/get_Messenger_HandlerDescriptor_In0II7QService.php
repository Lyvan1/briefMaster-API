<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_In0II7QService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.messenger.handler_descriptor.In0II7Q' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Handler/HandlerDescriptor.php';

        return $container->privates['.messenger.handler_descriptor.In0II7Q'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(($container->privates['App\\MessageHandler\\ClearRefreshTokenFromDatabaseHandler'] ?? $container->load('getClearRefreshTokenFromDatabaseHandlerService')), ['method' => '__invoke']);
    }
}
