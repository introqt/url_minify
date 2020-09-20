<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nikita',
            'email' => 'nikita.kolotilo@gmail.com',
            'password' => Hash::make('qweqwe33'),
            'email_verified_at' => now(),
        ]);
    }
}
