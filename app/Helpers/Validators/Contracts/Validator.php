<?php

namespace App\Helpers\Validators\Contracts;

interface Validator
{

    /**
     * @param  string  $value
     * @return bool
     */
    public function validate(string $value): bool;
}