<?php

namespace ContainerSszQNE1;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_JsonSchema_JsonSchemaGenerateCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'api_platform.json_schema.json_schema_generate_command' shared service.
     *
     * @return \ApiPlatform\JsonSchema\Command\JsonSchemaGenerateCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/JsonSchema/Command/JsonSchemaGenerateCommand.php';

        $container->privates['api_platform.json_schema.json_schema_generate_command'] = $instance = new \ApiPlatform\JsonSchema\Command\JsonSchemaGenerateCommand(($container->privates['api_platform.json_schema.backward_compatible_schema_factory'] ?? $container->load('getApiPlatform_JsonSchema_BackwardCompatibleSchemaFactoryService')), $container->parameters['api_platform.formats']);

        $instance->setName('api:json-schema:generate');

        return $instance;
    }
}