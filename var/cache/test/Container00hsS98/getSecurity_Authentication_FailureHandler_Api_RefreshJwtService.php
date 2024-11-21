<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authentication_FailureHandler_Api_RefreshJwtService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.authentication.failure_handler.api.refresh_jwt' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Security\Http\Authentication\AuthenticationFailureHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationFailureHandlerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle/Security/Http/Authentication/AuthenticationFailureHandler.php';

        $a = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->privates['security.authentication.failure_handler.api.refresh_jwt'])) {
            return $container->privates['security.authentication.failure_handler.api.refresh_jwt'];
        }

        return $container->privates['security.authentication.failure_handler.api.refresh_jwt'] = new \Gesdinet\JWTRefreshTokenBundle\Security\Http\Authentication\AuthenticationFailureHandler($a);
    }
}
