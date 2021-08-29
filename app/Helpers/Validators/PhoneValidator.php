<?php

namespace App\Helpers\Validators;

class PhoneValidator extends BaseRegexValidator
{

    public function getRegex(): string
    {
        return "/^([(][+]{1}[0-9]{2}[)]?[[:space:]])?([0-9]{3})?([[:space:]]|-)?([0-9]{3})?([[:space:]]|-)([0-9]{4})$/";
    }
}