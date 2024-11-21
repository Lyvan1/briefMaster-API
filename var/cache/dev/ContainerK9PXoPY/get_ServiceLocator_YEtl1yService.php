<?php

namespace ContainerK9PXoPY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_YEtl1yService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.YEtl_1y' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.YEtl_1y'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'companyRepo' => ['privates', 'App\\Repository\\CompanyRepository', 'getCompanyRepositoryService', false],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'logger' => ['privates', 'monolog.logger', 'getMonolog_LoggerService', false],
            'serializer' => ['privates', 'serializer', 'getSerializerService', false],
            'uploadHandler' => ['services', 'vich_uploader.upload_handler', 'getVichUploader_UploadHandlerService', true],
        ], [
            'companyRepo' => 'App\\Repository\\CompanyRepository',
            'entityManager' => '?',
            'logger' => '?',
            'serializer' => '?',
            'uploadHandler' => '?',
        ]);
    }
}
