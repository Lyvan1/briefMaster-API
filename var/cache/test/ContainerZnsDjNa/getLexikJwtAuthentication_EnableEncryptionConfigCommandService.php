<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLexikJwtAuthentication_EnableEncryptionConfigCommandService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'lexik_jwt_authentication.enable_encryption_config_command' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Command\EnableEncryptionConfigCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Command/BuildDebugContainerTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Command/ContainerDebugCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Command/AbstractConfigCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/Command/EnableEncryptionConfigCommand.php';

        $container->privates['lexik_jwt_authentication.enable_encryption_config_command'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Command\EnableEncryptionConfigCommand(NULL);

        $instance->setName('lexik:jwt:enable-encryption');
        $instance->setDescription('Enable Web-Token encryption support.');

        return $instance;
    }
}
