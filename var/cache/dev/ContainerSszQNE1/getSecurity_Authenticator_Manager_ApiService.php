<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_Manager_ApiService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.authenticator.manager.api' shared service.
     *
     * @return \Symfony\Component\Security\Http\Authentication\AuthenticatorManager
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticatorManagerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/UserAuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticatorManager.php';

        $a = ($container->privates['security.authenticator.jwt.api'] ?? $container->load('getSecurity_Authenticator_Jwt_ApiService'));

        if (isset($container->privates['security.authenticator.manager.api'])) {
            return $container->privates['security.authenticator.manager.api'];
        }
        $b = ($container->privates['security.authenticator.refresh_jwt.api'] ?? $container->load('getSecurity_Authenticator_RefreshJwt_ApiService'));

        if (isset($container->privates['security.authenticator.manager.api'])) {
            return $container->privates['security.authenticator.manager.api'];
        }
        $c = ($container->privates['debug.security.event_dispatcher.api'] ?? $container->load('getDebug_Security_EventDispatcher_ApiService'));

        if (isset($container->privates['security.authenticator.manager.api'])) {
            return $container->privates['security.authenticator.manager.api'];
        }

        return $container->privates['security.authenticator.manager.api'] = new \Symfony\Component\Security\Http\Authentication\AuthenticatorManager([$a, $b], ($container->privates['security.token_storage'] ?? self::getSecurity_TokenStorageService($container)), $c, 'api', ($container->privates['monolog.logger.security'] ?? self::getMonolog_Logger_SecurityService($container)), true, true, []);
    }
}
