<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class isValidTarget extends Constraint
{
    public string $messageCivilStatusValues = 'civilStatus must be one or more of these variables: Marrié(e), Célibataire, Divorcé(e)';
    public string $messageGenderValues = 'gender must be one or more of these values: Homme, Femme, Enfant.';

    public string $messageHousingTypeValues = 'housingType must be one or more of these values: Appartement, Maison';

    public string $messageHousingStatusValues = 'housingStatus must be one or more of these values: Locataire, Propriétaire.';
    public string $messageHousingDataValues = 'housingData must be one or more of these values: Piscine, PAC, Radiateur Solaire, Radiateur Electrique, Chauffe-eau, Climatiseur, Classe Energie: A, Classe Energie: B, Classe Energie: C, Classe Energie: D,Classe Energie: E,Classe Energie: F, Classe Energie: G';

    public array $allowedModes = ['civilStatusMode', 'genderMode', 'housingTypeMode', 'housingDataMode', 'housingStatusMode'];

    public function __construct(array $allowedModes = [], array $errorsMessages = null, array $groups = null, $payload = null)
    {
        parent::__construct([], $groups, $payload);
        $this->allowedModes = $allowedModes;
    }

}