<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_ImpersonateUrlGeneratorService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.impersonate_url_generator' shared service.
     *
     * @return \Symfony\Component\Security\Http\Impersonate\ImpersonateUrlGenerator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Impersonate/ImpersonateUrlGenerator.php';

        $a = ($container->privates['security.firewall.map'] ?? self::getSecurity_Firewall_MapService($container));

        if (isset($container->privates['security.impersonate_url_generator'])) {
            return $container->privates['security.impersonate_url_generator'];
        }

        return $container->privates['security.impersonate_url_generator'] = new \Symfony\Component\Security\Http\Impersonate\ImpersonateUrlGenerator(($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), $a, ($container->privates['security.token_storage'] ?? self::getSecurity_TokenStorageService($container)));
    }
}
