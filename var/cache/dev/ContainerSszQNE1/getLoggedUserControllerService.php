<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLoggedUserControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\LoggedUserController' shared autowired service.
     *
     * @return \App\Controller\LoggedUserController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/LoggedUserController.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Security.php';

        $container->services['App\\Controller\\LoggedUserController'] = $instance = new \App\Controller\LoggedUserController(new \Symfony\Bundle\SecurityBundle\Security(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'security.authenticator.managers_locator' => ['privates', 'security.authenticator.managers_locator', 'getSecurity_Authenticator_ManagersLocatorService', true],
            'security.authorization_checker' => ['privates', 'security.authorization_checker', 'getSecurity_AuthorizationCheckerService', false],
            'security.csrf.token_manager' => ['privates', 'security.csrf.token_manager', 'getSecurity_Csrf_TokenManagerService', true],
            'security.firewall.event_dispatcher_locator' => ['privates', 'security.firewall.event_dispatcher_locator', 'getSecurity_Firewall_EventDispatcherLocatorService', true],
            'security.firewall.map' => ['privates', 'security.firewall.map', 'getSecurity_Firewall_MapService', false],
            'security.token_storage' => ['privates', 'security.token_storage', 'getSecurity_TokenStorageService', false],
            'security.user_checker' => ['privates', 'security.user_checker', 'getSecurity_UserCheckerService', true],
        ], [
            'request_stack' => '?',
            'security.authenticator.managers_locator' => '?',
            'security.authorization_checker' => '?',
            'security.csrf.token_manager' => '?',
            'security.firewall.event_dispatcher_locator' => '?',
            'security.firewall.map' => '?',
            'security.token_storage' => '?',
            'security.user_checker' => '?',
        ]), ['dev' => NULL, 'login' => new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'security.authenticator.json_login.login' => ['privates', 'security.authenticator.json_login.login', 'getSecurity_Authenticator_JsonLogin_LoginService', true],
        ], [
            'security.authenticator.json_login.login' => '?',
        ]), 'api' => new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'security.authenticator.jwt.api' => ['privates', 'security.authenticator.jwt.api', 'getSecurity_Authenticator_Jwt_ApiService', true],
            'security.authenticator.refresh_jwt.api' => ['privates', 'security.authenticator.refresh_jwt.api', 'getSecurity_Authenticator_RefreshJwt_ApiService', true],
        ], [
            'security.authenticator.jwt.api' => '?',
            'security.authenticator.refresh_jwt.api' => '?',
        ]), 'main' => NULL]));

        $instance->setContainer(($container->privates['.service_locator.jUv.zyj'] ?? $container->load('get_ServiceLocator_JUv_ZyjService'))->withContext('App\\Controller\\LoggedUserController', $container));

        return $instance;
    }
}
