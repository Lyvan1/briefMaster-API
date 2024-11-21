<?php
// src/Service/MailService.php
namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Psr\Log\LoggerInterface;

class MailCompanySubscription
{
    public function __construct(private readonly MailerInterface $mailer, private readonly LoggerInterface $logger)
    {
    }

    public function sendSubscriptionRequest($email, $company): void
    {
        try {
            $email = (new TemplatedEmail())
                ->from(new Address('no-reply@example.com', 'Brief Master'))
                ->to($email)
                ->subject('A new company have sent a subscription request.')
                ->htmlTemplate('emails/subscription_request.html.twig')
                ->context([
                    'company' => $company,
                ]);

            $this->mailer->send($email);
        } catch (\Exception $e) {
            $this->logger->error('Failed to send subscription request email: ' . $e->getMessage());
        }
    }

    public function sendConfirmationSubscriptionEmail($email, $company): void{
        try {
            $email = (new TemplatedEmail())
                ->from(new Address('no-reply@example.com', 'Brief Master'))
                ->to($email)
                ->subject('You\'ve just sent a subscription request.')
                ->htmlTemplate('emails/confirmationSubscription_request.html.twig')
                ->context([
                    'company' => $company,
                ]);

            $this->mailer->send($email);
        } catch (\Exception $e) {
            $this->logger->error('Failed to send subscription request email: ' . $e->getMessage());
        }
    }
}

