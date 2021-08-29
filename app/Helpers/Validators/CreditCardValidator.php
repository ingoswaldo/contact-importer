<?php

namespace App\Helpers\Validators;

use App\Helpers\Repository\CreditCardTypeRepository;
use Illuminate\Database\Eloquent\Model;

class CreditCardValidator implements Contracts\Validator
{

    /**
     * @inheritDoc
     */
    public function validate(string $value): bool
    {
        $repository = new CreditCardTypeRepository();

        return $repository->findFranchiseByCardNumber($value) !== null;
    }
}