<?php

namespace Container9yINWxc;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTaskRepositoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Repository\TaskRepository' shared autowired service.
     *
     * @return \App\Repository\TaskRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Repository/TaskRepository.php';

        return $container->privates['App\\Repository\\TaskRepository'] = new \App\Repository\TaskRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}
