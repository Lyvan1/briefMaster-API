<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIsValidTargetValidatorService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Validator\isValidTargetValidator' shared autowired service.
     *
     * @return \App\Validator\isValidTargetValidator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/validator/ConstraintValidatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/validator/ConstraintValidator.php';
        include_once \dirname(__DIR__, 4).'/src/Validator/isValidTargetValidator.php';

        return $container->privates['App\\Validator\\isValidTargetValidator'] = new \App\Validator\isValidTargetValidator();
    }
}
