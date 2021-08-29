<?php

namespace App\Helpers\Repository;

use App\Models\CreditCardType;

class CreditCardTypeRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(new CreditCardType());
    }

    public function getCreditCardTypes()
    {
        return $this->query()
            ->get();
    }

    public function findFranchiseByCardNumber(string $cardNumber)
    {
        return $this->getCreditCardTypes()
            ->first(function ($value) use($cardNumber){
                return $this->cardNumberIsInInnRanges($cardNumber, json_decode($value->inn_ranges)) && $this->cardNumberIsInLengthRanges($cardNumber, $value->length_ranges);
            });
    }

    private function cardNumberIsInInnRanges(string $cardNumber, array $innRanges): bool
    {
        foreach ($innRanges as $innRange) {
            if (is_int($innRange) && $this->cardNumberStartsWithEqualInnRange($cardNumber, (string) $innRange)){
                return true;
            }

            if (is_string($innRange) && $this->cardNumberIsBetweenInnRange($cardNumber, $innRange)){
                return true;
            }
        }

        return false;
    }

    private function cardNumberIsInLengthRanges(string $cardNumber, string $lengthRanges): bool
    {
        $length = (string) strlen($cardNumber);
        $ranges = explode('-', $lengthRanges);

        if (count($ranges) === 2){
            return $length >= $ranges[0] && $length <= $ranges[1];
        }

        return $length === $ranges[0];
    }

    private function cardNumberStartsWithEqualInnRange(string $cardNumber, string $innRange): bool
    {
        $length = strlen($innRange);
        $startOfCardNumber = substr($cardNumber, 0, $length);

        return $startOfCardNumber === $innRange;
    }

    private function cardNumberIsBetweenInnRange(string $cardNumber, string $innRange): bool
    {
        $rangeNumbers = explode('-', $innRange);

        return $cardNumber >= $rangeNumbers[0] && $cardNumber <= $rangeNumbers[1];
    }
}