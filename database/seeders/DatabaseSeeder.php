<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->hasClaims(2)
            ->create();

        User::factory(1)
            ->state([
                'name' => 'test user',
                'email' => 'test_user@test.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
                'role' => 'client'
            ])
            ->create();

        User::factory(1)
            ->state([
                'name' => 'test manager',
                'email' => 'test@test.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
                'role' => 'manager'
            ])
            ->create();


    }
}
