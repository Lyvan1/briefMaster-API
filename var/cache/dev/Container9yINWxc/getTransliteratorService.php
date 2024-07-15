<?php

namespace Container9yINWxc;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTransliteratorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Vich\UploaderBundle\Util\Transliterator' shared service.
     *
     * @return \Vich\UploaderBundle\Util\Transliterator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Util/Transliterator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/string/Slugger/SluggerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/translation-contracts/LocaleAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/string/Slugger/AsciiSlugger.php';

        return $container->privates['Vich\\UploaderBundle\\Util\\Transliterator'] = new \Vich\UploaderBundle\Util\Transliterator(($container->privates['slugger'] ??= new \Symfony\Component\String\Slugger\AsciiSlugger('en')));
    }
}
