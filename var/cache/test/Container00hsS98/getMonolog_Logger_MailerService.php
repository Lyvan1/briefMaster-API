<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMonolog_Logger_MailerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'monolog.logger.mailer' shared service.
     *
     * @return \Monolog\Logger
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['monolog.logger.mailer'] = $instance = new \Monolog\Logger('mailer');

        $instance->pushHandler(($container->privates['monolog.handler.main'] ?? self::getMonolog_Handler_MainService($container)));

        return $instance;
    }
}
