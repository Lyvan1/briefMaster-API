<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getBriefRepositoryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Repository\BriefRepository' shared autowired service.
     *
     * @return \App\Repository\BriefRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Repository/BriefRepository.php';

        return $container->privates['App\\Repository\\BriefRepository'] = new \App\Repository\BriefRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}