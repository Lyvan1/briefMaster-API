<?php

namespace ContainerZnsDjNa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUploaderHelperService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'Vich\UploaderBundle\Templating\Helper\UploaderHelper' shared service.
     *
     * @return \Vich\UploaderBundle\Templating\Helper\UploaderHelper
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Templating/Helper/UploaderHelperInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Templating/Helper/UploaderHelper.php';

        return $container->privates['Vich\\UploaderBundle\\Templating\\Helper\\UploaderHelper'] = new \Vich\UploaderBundle\Templating\Helper\UploaderHelper(($container->privates['vich_uploader.storage.file_system'] ?? self::getVichUploader_Storage_FileSystemService($container)));
    }
}
