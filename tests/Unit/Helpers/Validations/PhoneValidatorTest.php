<?php

namespace Tests\Unit\Helpers\Validations;

use App\Helpers\Validators\PhoneValidator;
use PHPUnit\Framework\TestCase;

class PhoneValidatorTest extends TestCase
{

    public function test_birthdate_is_valid()
    {
        $this->assertTrue((new PhoneValidator())->validate('(+57) 321 456 7890'));
        $this->assertTrue((new PhoneValidator())->validate('(+57) 321-456-7890'));
    }

    public function test_birthdate_is_invalid()
    {
        $this->assertFalse((new PhoneValidator())->validate('+57 321-456-7890'));
        $this->assertFalse((new PhoneValidator())->validate('(+57) 3214567890'));
        $this->assertFalse((new PhoneValidator())->validate('(+57)321 456 7890'));
    }
}
