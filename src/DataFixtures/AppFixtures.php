<?php

namespace App\DataFixtures;

use App\Entity\BusinessModel;
use App\Entity\Company;
use App\Entity\Leverage;
use App\Entity\Status;
use App\Entity\User;
use App\Entity\UsersRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {

        // CHARGEMENT DES FIXTURES: php bin/console doctrine:fixtures:load --append
        $businessModelData = file_get_contents(__DIR__.'/businessModelData.json');
        $jsonBusinessModelData = json_decode($businessModelData);

        $usersRolesData = file_get_contents(__DIR__.'/usersRoleData.json');
        $jsonUsersRolesData = json_decode($usersRolesData);

        $leverageData = file_get_contents(__DIR__.'/leverageData.json');
        $jsonLeverageData = json_decode($leverageData);

        $statusData = file_get_contents(__DIR__.'/statusData.json');
        $jsonStatusData = json_decode($statusData);

        foreach($jsonStatusData as $data){
            $status = new Status();
            $status->setName($data->name);
            $manager->persist($status);
        }

        foreach ($jsonLeverageData as $data) {
            $leverage = new Leverage();
            $leverage->setName($data->name);
            $manager->persist($leverage);
        }

        foreach($jsonBusinessModelData as $data){
            $businessModel = new BusinessModel();
            $businessModel->setName($data->name);
            $manager->persist($businessModel);
        }

        $userRoles = [];
        foreach($jsonUsersRolesData as $data){
            $role = new UsersRole();
            $role->setName($data->name);
            $manager->persist($role);
            $manager->flush();
            $userRoles[] = $role;
        }

        $company = new Company();
        $company->setName('Entreprise test');
        $company->setZipcode('75018');
        $company->setCity("Ville test");
        $company->setAddress("addresse test");
        $company->setCompanyRegistrationNumber('12345678912345');
        $company->setCountry('France');
        $company->setVatNumber('123456789');
        $manager->persist($company);

        $user = new User();
        $user->setFirstname('firstname');
        $user->setLastname('lastname');
        $user->setCompany($company);
        $user->setEmail('test@gmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user,'Rex121792//'));
        $user->setRoles($userRoles[0]);
        $manager->persist($user);


        $manager->flush();
    }
}
