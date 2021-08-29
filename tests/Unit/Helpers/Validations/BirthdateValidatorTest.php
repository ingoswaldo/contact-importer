<?php

namespace Tests\Unit\Helpers\Validations;

use App\Helpers\Validators\BirthdateValidator;
use PHPUnit\Framework\TestCase;

class BirthdateValidatorTest extends TestCase
{

    public function test_birthdate_is_valid()
    {
        $this->assertTrue((new BirthdateValidator())->validate('2021-08-29'));
    }

    public function test_birthdate_is_invalid()
    {
        $this->assertFalse((new BirthdateValidator())->validate('2021/08/29'));
        $this->assertFalse((new BirthdateValidator())->validate('29-08-2021'));
    }
}
