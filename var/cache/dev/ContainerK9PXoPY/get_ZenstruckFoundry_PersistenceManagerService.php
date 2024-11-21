<?php

namespace ContainerK9PXoPY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_PersistenceManagerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.zenstruck_foundry.persistence_manager' shared service.
     *
     * @return \Zenstruck\Foundry\Persistence\PersistenceManager
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Persistence/PersistenceManager.php';

        return $container->privates['.zenstruck_foundry.persistence_manager'] = new \Zenstruck\Foundry\Persistence\PersistenceManager(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.zenstruck_foundry.persistence_strategy.orm'] ?? $container->load('get_ZenstruckFoundry_PersistenceStrategy_OrmService'));
        }, 1));
    }
}
