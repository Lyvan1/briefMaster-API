<?php
namespace App\EventListener;

use ApiPlatform\Symfony\Validator\Exception\ValidationException;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionListener
{
    #[AsEventListener(event: KernelEvents::EXCEPTION)]
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $response = new JsonResponse();

        // Gestion de l'exception de violation de contrainte de clé étrangère
        if ($exception instanceof ForeignKeyConstraintViolationException) {
            $response->setData([
                'status' => JsonResponse::HTTP_CONFLICT,
                'message' => 'An error occurred.',
                'error' => 'Cannot delete or update this resource because it is referenced by another resource.'
            ]);
            $response->setStatusCode(JsonResponse::HTTP_BAD_REQUEST);
            $event->setResponse($response);
            return;
        }

        // Gestion de l'exception de validation
        if ($exception instanceof ValidationException) {

            $violationList = $exception->getConstraintViolationList();
            $errors = [];
            foreach ($violationList as $violation) {
                $propertyPath = $violation->getPropertyPath();
                $message = $violation->getMessage();
                $errors[$propertyPath] = $message;
            }

            $response->setData([
                'status' => $exception->getStatusCode(),
                'message' => 'An error occurred.',
                'error' => $errors
            ]);
            $response->setStatusCode($exception->getStatusCode());
            $event->setResponse($response);
            return;
        }

        // Gestion des autres exceptions
        $response->setData([
            'status' => $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
            'message' => 'An error occurred.',
            'error' => $exception->getMessage()
        ]);

        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
        } else {
            $response->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        $event->setResponse($response);
    }
}
