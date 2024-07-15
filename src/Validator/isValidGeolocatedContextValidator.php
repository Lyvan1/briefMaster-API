<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class isValidGeolocatedContextValidator extends ConstraintValidator
{

    /**
     * @inheritDoc
     */
    public function validate(mixed $value, Constraint $constraint)
    {
        /*Cette partie vérifie que la contrainte passée est du type attendu (ContainsAlphanumeric).
        Si ce n'est pas le cas, une exception UnexpectedTypeException est levée.*/
        if(!$constraint instanceof isValidGeolocatedContext){
            throw new UnexpectedTypeException($constraint, isValidGeolocatedContext::class);
        }

        /*Si la valeur à valider est null ou une chaîne vide, la validation est ignorée*/
        if($value === null || $value ===''){
            return;
        }

        /*Si la valeur n'est pas un tableau une exception UnexpectedValueException est levée.
        Cette exception signale que le validateur ne peut pas gérer le type de valeur fourni.*/
        if(!is_array($value)){
            throw new UnexpectedValueException($value, 'array');
        }

        // Validation selon cette REGEX. format attendu ["60","75000"] (un tableau avec des numéros de département ou des codes postaux)
        if(preg_match('/^\["(\d{2}|\d{5})"(?:(?:, ?)"(\d{2}|\d{5})")*\]$/', json_encode($value))){
            return;
        }

        /*Si la validation échoue, une violation de contrainte est construite avec le message défini dans la contrainte ($constraint->message).
        Le paramètre {{ string }} est remplacé par la valeur réelle qui a échoué à la validation.
        La violation est ensuite ajoutée au contexte de validation.*/
        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ string }}', json_encode($value))
            ->addViolation();
    }
}