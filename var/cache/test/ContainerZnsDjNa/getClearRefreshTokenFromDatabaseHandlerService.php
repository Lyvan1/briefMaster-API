<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getClearRefreshTokenFromDatabaseHandlerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\MessageHandler\ClearRefreshTokenFromDatabaseHandler' shared autowired service.
     *
     * @return \App\MessageHandler\ClearRefreshTokenFromDatabaseHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/MessageHandler/ClearRefreshTokenFromDatabaseHandler.php';

        $a = ($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container));

        if (isset($container->privates['App\\MessageHandler\\ClearRefreshTokenFromDatabaseHandler'])) {
            return $container->privates['App\\MessageHandler\\ClearRefreshTokenFromDatabaseHandler'];
        }

        return $container->privates['App\\MessageHandler\\ClearRefreshTokenFromDatabaseHandler'] = new \App\MessageHandler\ClearRefreshTokenFromDatabaseHandler($a);
    }
}
