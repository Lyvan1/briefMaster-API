<?php

namespace App\Controller;

use App\Message\ClearRefreshTokenFromDatabase;
use App\MessageHandler\ClearRefreshTokenFromDatabaseHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;


class CallMessageClearRefreshTokenController extends AbstractController
{
    #[Route('/briefApi/clearRefreshToken', name: 'clear_refresh_token', methods: ['GET'])]
    public function sendMessage(MessageBusInterface $messageBus, ClearRefreshTokenFromDatabaseHandler $handler): Response
    {
        $message = new ClearRefreshTokenFromDatabase();
        $messageBus->dispatch($message);
        $result = $handler($message); // Invoke the handler directly to get the result

        return $result;
    }
}