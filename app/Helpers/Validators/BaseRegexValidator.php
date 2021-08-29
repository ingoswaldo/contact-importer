<?php

namespace App\Helpers\Validators;

use App\Helpers\Validators\Contracts\Validator;

abstract class BaseRegexValidator implements Validator
{

    public function validate(string $value): bool
    {
        return preg_match($this->getRegex(), $value);
    }

    /**
     * @return string
     */
    public abstract function getRegex(): string;
}