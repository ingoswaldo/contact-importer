<?php

namespace Tests\Unit\Helpers\Validations;

use App\Helpers\Validators\NameValidator;
use PHPUnit\Framework\TestCase;

class NameValidatorTest extends TestCase
{

    public function test_name_is_valid()
    {
        $this->assertTrue((new NameValidator())->validate('name valid'));
    }

    public function test_name_is_invalid()
    {
        $this->assertFalse((new NameValidator())->validate('name-valid'));
    }
}
