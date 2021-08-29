<?php

namespace Database\Seeders;

use App\Models\CreditCardType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class CreditCardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('creating credit card types');

        $message = 'Credit card types do not created';

        if ($this->createCreditCardTypes()->count() > 0){
            $message = 'Credit card types have been created';
        }

        $this->command->info($message);
    }

    private function createCreditCardTypes(): Collection
    {
        return CreditCardType::factory()->createMany([
            ['name' => 'American Express', 'inn_ranges' => [34, 37], 'length_ranges' => '15'],
            ['name' => 'Diners Club', 'inn_ranges' => [36], 'length_ranges' => '14-19'],
            ['name' => 'Discover', 'inn_ranges' => [6011, '622126–622925', '644-649', 65], 'length_ranges' => '16-19'],
            ['name' => 'JCB', 'inn_ranges' => ['3528–3589'], 'length_ranges' => '16-19'],
            ['name' => 'MasterCard', 'inn_ranges' => ['51–55', '2221–2720'], 'length_ranges' => '16'],
            ['name' => 'Visa', 'inn_ranges' => [4026, 417500, 4508, 4844, 4913, 4917], 'length_ranges' => '16'],
        ]);
    }
}
