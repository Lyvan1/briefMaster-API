<?php

namespace App\EventListener;

use ApiPlatform\Symfony\Validator\Exception\ValidationException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionListener
{
    #[AsEventListener(event: KernelEvents::EXCEPTION)]
    public function onKernelException(ExceptionEvent $event): void
    {

        $exception = $event->getThrowable();
        $response = new JsonResponse();;

        $response->setData([
            'status' => $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : 500,
            'message' => 'An error occurred.',
            'error' => $exception->getMessage()
        ]);

        if($exception instanceof ValidationException){

            $violationList = $exception->getConstraintViolationList();
            $errors = [];
            /** @var ConstraintViolationInterface $violation */
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

        }

        // Si l'exception est une HttpException, définissez le code de statut de la réponse
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
        } else {
            $response->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Définir la réponse
        $event->setResponse($response);

        // ...
    }
}
