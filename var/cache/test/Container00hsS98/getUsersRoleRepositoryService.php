<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUsersRoleRepositoryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Repository\UsersRoleRepository' shared autowired service.
     *
     * @return \App\Repository\UsersRoleRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Repository/UsersRoleRepository.php';

        return $container->privates['App\\Repository\\UsersRoleRepository'] = new \App\Repository\UsersRoleRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}
