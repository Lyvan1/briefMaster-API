<?php

namespace App\Tests\Functional;


use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Company;
use function Zenstruck\Foundry\faker;
use Zenstruck\Foundry\Test\Factories;


class CompanyTest extends ApiTestCase
{
    use Factories;
    protected function tearDown(): void
    {
        parent::tearDown();
        // Restaurez les gestionnaires d'exceptions si définis
        restore_exception_handler();
    }
    public function testCreateValidCompany(): void
    {
        $companyName = faker()->userName();
        $zipcode = (string) faker()->randomNumber(5, true);
        $city = faker()->city();
        $address = faker()->streetAddress();
        $companyRegistrationNumber = (string) faker()->unique()->numberBetween(1000000000, 9999999999);
        $country = faker()->country();
        $vatNumber = (string) faker()->unique()->numberBetween(1000000000, 9999999999);
        $mainUserEmail = faker()->email();
        $mainUserFirstName = faker()->firstName();
        $mainUserLastName = faker()->lastName();

        $response = static::createClient()->request('POST', '/briefApi/companies', [
            'extra' => [
                'parameters' => [
                    'name' => $companyName,
                    'zipcode' =>  $zipcode,
                    'city' => $city,
                    'address' => $address,
                    'companyRegistrationNumber' => $companyRegistrationNumber,
                    'country' => $country,
                    'vatNumber' => $vatNumber,
                    'mainUserEmail' => $mainUserEmail,
                    'mainUserFirstname' => $mainUserFirstName,
                    'mainUserLastname' => $mainUserLastName,
                ],
            ],
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('Content-Type', "application/ld+json; charset=utf-8");
        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'name' => $companyName,
                'zipcode' => $zipcode,
                'city' => $city,
                'address' => $address,
                'companyRegistrationNumber' => $companyRegistrationNumber,
                'country' => $country,
                'vatNumber' => $vatNumber,
                'mainUserEmail' => $mainUserEmail,
                'mainUserFirstname' => $mainUserFirstName,
                'mainUserLastname' => $mainUserLastName,
            ]),
            $response->getContent()
        );
        $this->assertMatchesResourceItemJsonSchema(Company::class);
    }

}
