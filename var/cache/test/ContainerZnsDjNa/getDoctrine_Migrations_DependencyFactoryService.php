<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Migrations_DependencyFactoryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'doctrine.migrations.dependency_factory' shared service.
     *
     * @return \Doctrine\Migrations\DependencyFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/lib/Doctrine/Migrations/DependencyFactory.php';

        $container->privates['doctrine.migrations.dependency_factory'] = $instance = \Doctrine\Migrations\DependencyFactory::fromEntityManager(($container->privates['doctrine.migrations.configuration_loader'] ?? $container->load('getDoctrine_Migrations_ConfigurationLoaderService')), ($container->privates['doctrine.migrations.entity_manager_registry_loader'] ?? $container->load('getDoctrine_Migrations_EntityManagerRegistryLoaderService')), ($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)));

        $instance->setDefinition('Doctrine\\Migrations\\Version\\MigrationFactory', #[\Closure(name: 'doctrine.migrations.migrations_factory', class: 'Doctrine\\Migrations\\Version\\MigrationFactory')] fn () => ($container->privates['doctrine.migrations.migrations_factory'] ?? $container->load('getDoctrine_Migrations_MigrationsFactoryService')));

        return $instance;
    }
}
