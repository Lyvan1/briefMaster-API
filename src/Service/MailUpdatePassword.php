<?php
// src/Service/MailService.php
namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Psr\Log\LoggerInterface;

class MailUpdatePassword
{
    public function __construct(private readonly MailerInterface $mailer, private readonly LoggerInterface $logger)
    {
    }

    public function sendPasswordChangedEmail($user, $generatedPassword): void
    {
        try {
            $email = (new TemplatedEmail())
                ->from(new Address('no-reply@example.com', 'Brief Master'))
                ->to($user->getEmail())
                ->subject('Your password has been changed')
                ->htmlTemplate('emails/password_changed.html.twig')
                ->context([
                    'user' => $user,
                    'generatedPassword' => $generatedPassword,
                ]);

            $this->mailer->send($email);
        } catch (\Exception $e) {
            $this->logger->error('Failed to send password changed email: ' . $e->getMessage());
        }
    }
}

