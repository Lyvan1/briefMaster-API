<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_PersistenceStrategy_OrmService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.zenstruck_foundry.persistence_strategy.orm' shared service.
     *
     * @return \Zenstruck\Foundry\ORM\OrmV3PersistenceStrategy
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Persistence/PersistenceStrategy.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/ORM/AbstractORMPersistenceStrategy.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/ORM/OrmV3PersistenceStrategy.php';

        return $container->privates['.zenstruck_foundry.persistence_strategy.orm'] = new \Zenstruck\Foundry\ORM\OrmV3PersistenceStrategy(($container->services['doctrine'] ?? self::getDoctrineService($container)), ['auto_persist' => true, 'reset' => ['connections' => ['default'], 'entity_managers' => ['default'], 'mode' => 'schema']]);
    }
}
