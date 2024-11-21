<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Repository\UserRepository;
use App\Repository\UsersRoleRepository;
use App\Service\MailCompanySubscription;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class CompanyCreationStateProcessor implements ProcessorInterface
{

    public function __construct(private ProcessorInterface $innerProcessor,private UserRepository $userRepo, private UsersRoleRepository $userRoleRepo, private MailCompanySubscription $mailService)
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {


        $company = $data;
        $oceadsRole = $this->userRoleRepo->findOneBy(['name' => 'Oceads']);
        $oceadsUser = $this->userRepo->findBy(['roles' => $oceadsRole]);

        foreach ($oceadsUser as $oceadUser) {
            $emailUser = $oceadUser->getEmail();
            try {

                $this->mailService->sendSubscriptionRequest($emailUser, $company);
            } catch (TransportExceptionInterface $exception) {
                $logger->error('Failed to send subscription email: ' . $exception->getMessage());
                return new JsonResponse(['message' => 'Company created but failed to send email.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (\Exception $exception) {
                return new JsonResponse(['message' => 'An error occurred while sending the email: ' . $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        if(filter_var($company->getSignUp(), FILTER_VALIDATE_BOOLEAN)){
            $emailUser =$company->getMainUserEmail();
            try {

                $this->mailService->sendConfirmationSubscriptionEmail($emailUser, $company);
            } catch (TransportExceptionInterface $exception) {
                $logger->error('Failed to send confirmation subscription email: ' . $exception->getMessage());
                return new JsonResponse(['message' => 'Company created but failed to send email.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            } catch (\Exception $exception) {
                return new JsonResponse(['message' => 'An error occurred while sending the email: ' . $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        return $this->innerProcessor->process($data, $operation, $uriVariables, $context);
        // TODO: Implement process() method.
    }
}