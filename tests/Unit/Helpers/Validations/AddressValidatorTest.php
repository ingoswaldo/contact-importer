<?php

namespace Tests\Unit\Helpers\Validations;

use App\Helpers\Validators\AddressValidator;
use PHPUnit\Framework\TestCase;

class AddressValidatorTest extends TestCase
{

    public function test_address_is_valid()
    {
        $this->assertTrue((new AddressValidator())->validate('address valid'));
    }

    public function test_addres_is_invalid()
    {
        $this->assertFalse((new AddressValidator())->validate(''));
        $this->assertFalse((new AddressValidator())->validate(' '));
    }
}
