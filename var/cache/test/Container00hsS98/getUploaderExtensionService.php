<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUploaderExtensionService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'Vich\UploaderBundle\Twig\Extension\UploaderExtension' shared service.
     *
     * @return \Vich\UploaderBundle\Twig\Extension\UploaderExtension
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Twig/Extension/UploaderExtension.php';

        return $container->privates['Vich\\UploaderBundle\\Twig\\Extension\\UploaderExtension'] = new \Vich\UploaderBundle\Twig\Extension\UploaderExtension();
    }
}
