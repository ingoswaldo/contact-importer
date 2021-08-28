<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('creating user');

        $message = 'User does not created';

        if ($this->createSingleUser()){
            $message = 'User has been created';
        }

        $this->command->info($message);
    }

    private function createSingleUser(): bool
    {
        $user = $this->createUsers(1);

        if ($user instanceof Model){
            return $user->wasRecentlyCreated;
        }

        if ($user instanceof Collection){
            return $user->count() > 0;
        }

        return false;
    }

    private function createUsers(int $quantity = 100)
    {
        return User::factory($quantity)->create([
            'email' => 'user@user.com'
        ]);
    }
}
