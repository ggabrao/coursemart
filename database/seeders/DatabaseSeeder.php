<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Gabriel',
            'email' => 'gabriel@user',
            'email_verified_at' => now(),
            'password' => 'secret123',
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'Andrei',
            'email' => 'andrei@user',
            'email_verified_at' => now(),
            'password' => 'secret123',
            'remember_token' => Str::random(10),
        ]);

        $this->call(ProductSeeder::class);

        //todo: criar um método melhor de criar o Product vinculado ao User. Atualmente, o user_id em Product está hard coded para os dois usuários existentes
    }
}
