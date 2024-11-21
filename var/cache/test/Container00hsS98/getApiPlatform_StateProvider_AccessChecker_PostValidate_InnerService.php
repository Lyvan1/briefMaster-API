<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProvider_AccessChecker_PostValidate_InnerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.state_provider.access_checker.post_validate.inner' shared service.
     *
     * @return \ApiPlatform\Symfony\Validator\State\ValidateProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Validator/State/ValidateProvider.php';

        return $container->privates['api_platform.state_provider.access_checker.post_validate.inner'] = new \ApiPlatform\Symfony\Validator\State\ValidateProvider(($container->privates['api_platform.state_provider.query_parameter_validate'] ?? $container->load('getApiPlatform_StateProvider_QueryParameterValidateService')), ($container->privates['api_platform.validator'] ?? $container->load('getApiPlatform_ValidatorService')));
    }
}
