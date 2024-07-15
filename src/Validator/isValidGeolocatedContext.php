<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;


#[\Attribute]
class isValidGeolocatedContext extends Constraint
{
    public string $message = 'The data provided for geolocatedContext does not correspond to the expected format. example: ["60","75000"]';
    public string $mode = 'strict';

    public function __construct(string $mode = null, string $message = null, array $groups = null, $payload = null)
    {
        parent::__construct([], $groups, $payload);

        $this->mode = $mode ?? $this->mode;
        $this->message = $message ?? $this->message;
    }
}