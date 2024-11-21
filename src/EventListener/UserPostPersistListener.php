<?php
// src/EventListener/UserPostPersistListener.php
namespace App\EventListener;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Psr\Log\LoggerInterface;
use App\Entity\User;

class UserPostPersistListener
{
    private UrlGeneratorInterface $urlGenerator;
    private LoggerInterface $logger;

    public function __construct(UrlGeneratorInterface $urlGenerator, LoggerInterface $logger)
    {
        $this->urlGenerator = $urlGenerator;
        $this->logger = $logger;
    }

    public function postPersist(PostPersistEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof User) {
            try {
                $iri = $this->urlGenerator->generate('api_users_get_item', ['id' => $entity->getId()]);
                $this->logger->info('Generated IRI: ' . $iri);
            } catch (\Exception $e) {
                $this->logger->error('Failed to generate IRI: ' . $e->getMessage());
            }
        }
    }
}
