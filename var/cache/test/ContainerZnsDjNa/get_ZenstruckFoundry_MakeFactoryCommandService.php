<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_MakeFactoryCommandService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.zenstruck_foundry.make_factory_command' shared service.
     *
     * @return \Zenstruck\Foundry\Command\StubCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Command/StubCommand.php';

        $container->privates['.zenstruck_foundry.make_factory_command'] = $instance = new \Zenstruck\Foundry\Command\StubCommand('To run "make:factory" you need the "MakerBundle" which is currently not installed.'."\n".''."\n".'Try running "composer require symfony/maker-bundle --dev".');

        $instance->setName('make:factory');
        $instance->setHidden(true);
        $instance->setDescription('Creates a Foundry object factory');

        return $instance;
    }
}
