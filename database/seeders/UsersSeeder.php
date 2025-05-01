<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Tiago da Silva Sousa',
            'email' => 'acrossicauda@hotmail.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make(env('DEFAULT_PASSWORD')),
            'remember_token' => Str::random(10),
        ]);

    }
}
