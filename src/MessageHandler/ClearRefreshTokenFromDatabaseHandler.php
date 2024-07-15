<?php
// src/MessageHandler/ClearRefreshTokenFromDatabaseHandler.php
namespace App\MessageHandler;

use App\Message\ClearRefreshTokenFromDatabase;
use App\Repository\RefreshTokenRepository;
use Doctrine\ORM\EntityManagerInterface;

use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use function Symfony\Component\Clock\now;

class ClearRefreshTokenFromDatabaseHandler
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    #[AsMessageHandler]
    public function __invoke(ClearRefreshTokenFromDatabase $message,)
    {
        //Get the current dateTime
        $currentDateTime = new \DateTime();

        // Create a queryBuilder
        $queryBuilder = $this->entityManager->createQueryBuilder();

        //Use the query builder to select all refreshToken in database, where the validity date is lower than current dateTime.
        // mean these token are expired
        $queryBuilder->select('rt')->from('Gesdinet\JWTRefreshTokenBundle\Entity\RefreshToken', 'rt')
            ->where('rt.valid < :currentDateTime')
            ->setParameter('currentDateTime', $currentDateTime);

        // Execute the query
        $query = $queryBuilder->getQuery();

        //Get results
        $tokenList = $query->getResult();

        //Delete the tokens from the list
        if(count($tokenList) !== 0){
            foreach ($tokenList as $token) {
                $this->entityManager->remove($token);
            }
        }
        $this->entityManager->flush();
        dump('test');
    }
}
