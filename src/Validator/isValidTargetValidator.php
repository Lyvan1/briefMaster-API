<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class isValidTargetValidator extends ConstraintValidator
{

    /**
     * @inheritDoc
     */
    public function validate(mixed $value, Constraint $constraint)
    {
        /*Cette partie vérifie que la contrainte passée est du type attendu (ContainsAlphanumeric).
       Si ce n'est pas le cas, une exception UnexpectedTypeException est levée.*/
        if(!$constraint instanceof isValidTarget){
            throw new UnexpectedTypeException($constraint, isValidTarget::class);
        }

        /*Si la valeur à valider est null ou une chaîne vide, la validation est ignorée*/
        if($value === null || $value ===''){
            return;
        }

//      Analyse du mode passé en paramètre dans l'attribut pour la validation
        foreach ($constraint->allowedModes as $mode) {
            switch ($mode) {
                case 'civilStatusMode':
                    $allowedValues = ['Marié(e)', 'Célibataire', 'Divorcé(e)'];
//                    if (!is_array($value)) {
//                        throw new UnexpectedValueException($value, 'array');
//                    }
                foreach($value as $singleValue){
                    if (!in_array($singleValue, $allowedValues)) {
                        $this->context->buildViolation($constraint->messageCivilStatusValues)->addViolation();
                    }
                }

                    break;

                case 'housingStatusMode':
                    $allowedValues = ['Propriétaire', 'Locataire'];
                    foreach($value as $singleValue){
                        if(!in_array($singleValue, $allowedValues)){
                            $this->context->buildViolation($constraint->messageHousingStatusValues)->addViolation();
                        }
                    }

                    break;

                case 'housingTypeMode':
                    $allowedValues = ['Maison', 'Appartement'];
                    foreach ($value as $singleValue){
                        if(!in_array($singleValue, $allowedValues)){
                            $this->context->buildViolation($constraint->messageHousingTypeValues)->addViolation();
                        }
                    }
                    break;

                case 'genderMode':
                    $allowedValues = ['Homme', 'Femme'];
                    foreach($value as $singleValue){
                        if(!in_array($singleValue, $allowedValues)){
                            $this->context->buildViolation($constraint->messageGenderValues)->addViolation();
                        }
                    }
                    break;

                case 'housingDataMode':
                    $allowedValues = ['Piscine', 'PAC', 'Radiateur Solaire', 'Radiateur Electrique', 'Chauffe-eau', 'Climatiseur', 'Classe Energie: A', 'Classe Energie: B', 'Classe Energie: C', 'Classe Energie: D','Classe Energie: E','Classe Energie: F', 'Classe Energie: G'];
                    foreach($value as $singleValue){
                        if(!in_array($singleValue, $allowedValues)){
                            $this->context->buildViolation($constraint->messageHousingDataValues)->addViolation();
                        }
                    }
                    break;

                default:
                    // Cas où le mode n'est pas reconnu
                    $this->context->buildViolation('The mode list available for isValidTarget validator is civilStatusMode, genderMode, housingTypeMode, housingDataMode, housingStatusMode')->addViolation();
                    break;
            }
        }
    }
}