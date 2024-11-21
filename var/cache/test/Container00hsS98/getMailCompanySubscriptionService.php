<?php

namespace Container00hsS98;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailCompanySubscriptionService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Service\MailCompanySubscription' shared autowired service.
     *
     * @return \App\Service\MailCompanySubscription
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/MailCompanySubscription.php';

        $a = ($container->privates['mailer.mailer'] ?? $container->load('getMailer_MailerService'));

        if (isset($container->privates['App\\Service\\MailCompanySubscription'])) {
            return $container->privates['App\\Service\\MailCompanySubscription'];
        }

        return $container->privates['App\\Service\\MailCompanySubscription'] = new \App\Service\MailCompanySubscription($a, ($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)));
    }
}
