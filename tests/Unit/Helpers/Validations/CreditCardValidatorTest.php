<?php

namespace Tests\Unit\Helpers\Validations;

use App\Helpers\Validators\CreditCardValidator;
use App\Models\CreditCardType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreditCardValidatorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        CreditCardType::factory()->create([
            'name' => 'American Express',
            'inn_ranges' => "[34, 37]",
            'length_ranges' => '15',
        ]);
    }

    public function test_credit_card_number_is_valid()
    {
        $this->assertTrue((new CreditCardValidator())->validate('371449635398431'));
        $this->assertTrue((new CreditCardValidator())->validate('341449635398431'));
    }

    public function test_credit_card_number_is_invalid()
    {
        $this->assertFalse((new CreditCardValidator())->validate('37144963539843'));
        $this->assertFalse((new CreditCardValidator())->validate('31144963539843'));
    }
}
