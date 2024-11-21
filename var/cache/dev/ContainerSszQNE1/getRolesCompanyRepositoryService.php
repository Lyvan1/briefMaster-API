<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRolesCompanyRepositoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Repository\RolesCompanyRepository' shared autowired service.
     *
     * @return \App\Repository\RolesCompanyRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Repository/RolesCompanyRepository.php';

        return $container->privates['App\\Repository\\RolesCompanyRepository'] = new \App\Repository\RolesCompanyRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}
