<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRevokeRefreshTokenCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.Gesdinet\JWTRefreshTokenBundle\Command\RevokeRefreshTokenCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('gesdinet:jwt:revoke', [], 'Revoke a refresh token', false, #[\Closure(name: 'Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand')] fn (): \Gesdinet\JWTRefreshTokenBundle\Command\RevokeRefreshTokenCommand => ($container->privates['Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand'] ?? $container->load('getRevokeRefreshTokenCommandService')));
    }
}
