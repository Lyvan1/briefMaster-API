<?php

namespace App\Controller;

use DocuSign\eSign\Api\EnvelopesApi;
use DocuSign\eSign\Api\EnvelopesApi\ListStatusChangesOptions;
use DocuSign\eSign\Client\ApiClient;
use DocuSign\eSign\Client\ApiException;
use DocuSign\eSign\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

class DocusignController extends AbstractController
{

    /**
     * @throws ApiException
     */
    #[Route('/docusign', name: 'app_docusign')]
    public function index(): Response
    {
        $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__.'/../../.env');

        $rsaPrivateKey = file_get_contents(__DIR__.'/../../DocuSign.private.key');
        $integration_key = $_ENV['INTEGRATION_KEY'];
        $impersonatedUserId = $_ENV['USER_ID'];
        $scopes = "signature impersonation";


        $config = new Configuration();
        $apiClient = new ApiClient($config);
        try {
            $apiClient->getOAuth()->setOAuthBasePath("account-d.docusign.com");
            $response = $apiClient->requestJWTUserToken($integration_key, $impersonatedUserId, $rsaPrivateKey, $scopes,60 );

        } catch (Throwable $th) {

            // Si dans la réponse il y a consent_required, ça veut dire que le consentement initial est nécessaire
            if (str_contains($th->getMessage(), "consent_required")) {
                //Construction de l'url d'authorisation afin de l'afficher
                $authorizationURL = 'https://account-d.docusign.com/oauth/auth?' . http_build_query([
                        'scope'         => $scopes,
                        'redirect_uri'  => 'https://127.0.0.1:8000/docusign',
                        'client_id'     => $integration_key,
                        'response_type' => 'code'
                    ]);
                echo "It appears that you are using this integration key for the first time.  Please visit the following link to grant consent authorization.";
                echo "\n\n";
                echo "<a href=\"$authorizationURL\">$authorizationURL</a>";
                exit();
            }
        }

        if (isset($response)) {

            $access_token = $response[0]['access_token'];
            // Obtenir l'acccount Id
            $info = $apiClient->getUserInfo($access_token);
            $account_id = $info[0]["accounts"][0]["account_id"];

            // Instancier a nouveau l'API Client, avec comme header par défaut l'access token
            $config->setHost("https://demo.docusign.net/restapi");
            $config->addDefaultHeader('Authorization', 'Bearer ' . $access_token);
            $apiClient = new ApiClient($config);


            $envelope_api = new EnvelopesApi($apiClient);
            $from_date = date("c", (time() - (30 * 24 * 60 * 60)));
            $options = new ListStatusChangesOptions();
            $options->setFromDate($from_date);
            try {
                $results = $envelope_api->listStatusChanges($account_id, $options);
                echo "results";
                echo "\n\n";
                echo stripslashes($results);
            } catch (ApiException $e) {
                var_dump($e);
                exit;
            }
        }
        return $this->render('docusign/index.html.twig', [
            'controller_name' => 'DocusignController',
        ]);
    }
}
