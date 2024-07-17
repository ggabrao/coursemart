<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@user',
            'email_verified_at' => now(),
            'password' => 'secret123',
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'User2',
            'email' => 'user2@user',
            'email_verified_at' => now(),
            'password' => 'secret123',
            'remember_token' => Str::random(10),
        ]);
    }
}
