<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTwig_TemplateIteratorService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'twig.template_iterator' shared service.
     *
     * @return \Symfony\Bundle\TwigBundle\TemplateIterator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/twig-bundle/TemplateIterator.php';

        return $container->privates['twig.template_iterator'] = new \Symfony\Bundle\TwigBundle\TemplateIterator(($container->services['kernel'] ?? $container->get('kernel', 1)), [(\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Email') => 'email'], (\dirname(__DIR__, 4).'/templates'), ['*.twig']);
    }
}