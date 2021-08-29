<?php

namespace App\Helpers\Validators;

class NameValidator implements Contracts\Validator
{

    /**
     * @inheritDoc
     */
    public function validate(string $value): bool
    {
        return ! $this->hasMinusCharacter($value);
    }

    private function hasMinusCharacter(string $value): bool
    {
        return str_contains($value, '-');
    }
}