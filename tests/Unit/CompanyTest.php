<?php

namespace App\Tests\Unit;

use ApiPlatform\Validator\ValidatorInterface;
use App\Entity\Company;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use function Zenstruck\Foundry\faker;

class CompanyTest extends KernelTestCase
{
    private ValidatorInterface $validator;

    /*
     * Fonction setup qui s'exécute avant chaque test.
     *  Récupère le service de validation de symfony. grâce au container de service
     *
     *   */
    protected function setUp(): void
    {
        self::bootKernel();
        $this->validator = static::getContainer()->get(ValidatorInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Restaurez les gestionnaires d'exceptions si définis
        restore_exception_handler();
    }

    private function createCompany(): Company
    {
        return (new Company())
            ->setName(faker()->userName())
            ->setZipcode(faker()->randomNumber(5))
            ->setCity(faker()->city())
            ->setCountry(faker()->country())
            ->setAddress(faker()->streetAddress())
            ->setCompanyRegistrationNumber(faker()->unique()->numberBetween(1000000000, 9999999999))
            ->setVatNumber(faker()->unique()->numberBetween(1000000000, 9999999999))
            ->setMainUserEmail(faker()->email())
            ->setMainUserFirstname(faker()->firstName())
            ->setMainUserLastname(faker()->lastName());
    }


    /*
     * Fonction privée pour validaer uns instance de Company*/
    private function validate(Company $company): array
    {
        return $this->validator->validate($company);
    }

    // Test pour un nom trop court
    public function testInvalidNameTooShort(): void
    {
        $company = $this->createCompany();
        $company->setName('abc');

        // j'attends qu'une ValidationException soit lancée
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('name: Name must contain at least 5 characters');

        // Effectuer la validation
        $this->validate($company);
    }

    // Test pour payload sans name
    public function testInvalidNameEmpty(): void
    {
        $company = $this->createCompany();
        $company->setName('');

        // j'attends qu'une ValidationException soit lancée
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('name: Name must be specified.');

        // Effectuer la validation
        $this->validate($company);
    }

    // Test code postal avec lettre
    public function testInvalidZipcodeWithString(): void
    {
        $company = $this->createCompany();
        $company->setZipcode('test65');

        // j'attends qu'une ValidationException soit lancée
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('zipcode: ZipCode must only contain digits.');

        // Effectuer la validation
        $this->validate($company);
    }

    //test code postal invalid vide
    public function testInvalidZipcodeEmpty(): void
    {
        $company = $this->createCompany();
        $company->setZipcode('');

        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('zipcode: ZipCode must be specified.');
        $this->validate($company);
    }

    public function testInvalidZipcodeWithInvalidLength(): void
    {
        $company = $this->createCompany();
        $company->setZipcode('123');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('zipcode: ZipCode should have exactly 5 characters.');
        $this->validate($company);
    }

    public function testInvalidCityEmpty(): void
    {
        $company = $this->createCompany();
        $company->setCity('');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('city: City must be specified.');
        $this->validate($company);
    }

    public function testInvalidCompanyRegistrationNumberWithLetters(): void
    {
        $company = $this->createCompany();
        $company->setCompanyRegistrationNumber('Company Registration Number');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('companyRegistrationNumber: The Company Registration Number  must only contain digits.');
        $this->validate($company);
    }

    public function testInvalidCompanyRegistrationNumberEmpty(): void
    {
        $company = $this->createCompany();
        $company->setCompanyRegistrationNumber('');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('companyRegistrationNumber: The Company Registration Number must be specified.');
        $this->validate($company);
    }

    public function testInvalidVatNumberNumberWithLetters(): void
    {
        $company = $this->createCompany();
        $company->setVatNumber('Company VAT Number');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('vatNumber: The VAT Number  must only contain digits.');
        $this->validate($company);
    }

    public function testInvalidVatNumberEmpty(): void
    {
        $company = $this->createCompany();
        $company->setVatNumber('');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('vatNumber: vatNumber must be specified.');
        $this->validate($company);
    }

    public function testInvalidMainUserEmailEmpty(): void{
        $company = $this->createCompany();
        $company->setMainUserEmail('');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('mainUserEmail: The email must be specified.');
        $this->validate($company);
    }

    public function testInvalidMainUserEmailValue() :void{
        $company = $this->createCompany();
        $company->setMainUserEmail('invalid email');
        $this->expectException(\ApiPlatform\Symfony\Validator\Exception\ValidationException::class);
        $this->expectExceptionMessage('mainUserEmail: The email "'.$company->getMainUserEmail().'" is not a valid email.');
        $errors = $this->validate($company);
    }

}