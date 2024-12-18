<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProvider_QueryParameterValidateService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.state_provider.query_parameter_validate' shared service.
     *
     * @return \ApiPlatform\Symfony\Validator\State\QueryParameterValidateProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Validator/State/QueryParameterValidateProvider.php';

        return $container->privates['api_platform.state_provider.query_parameter_validate'] = new \ApiPlatform\Symfony\Validator\State\QueryParameterValidateProvider(($container->privates['api_platform.state_provider.access_checker.post_deserialize'] ?? $container->load('getApiPlatform_StateProvider_AccessChecker_PostDeserializeService')), ($container->privates['api_platform.validator.query_parameter_validator'] ?? self::getApiPlatform_Validator_QueryParameterValidatorService($container)));
    }
}
