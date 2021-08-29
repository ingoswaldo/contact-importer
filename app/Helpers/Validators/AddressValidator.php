<?php

namespace App\Helpers\Validators;

class AddressValidator implements Contracts\Validator
{

    /**
     * @inheritDoc
     */
    public function validate(string $value): bool
    {
        return $value !== '' && $value !== ' ';
    }
}