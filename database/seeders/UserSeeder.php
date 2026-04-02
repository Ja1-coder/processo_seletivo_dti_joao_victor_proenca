<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'João Victor',
            'email' => 'joao@teste.com',
            'password' => Hash::make('teste123'),
        ]);

        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@teste.com',
            'password' => Hash::make('teste123'),
        ]);

        User::create([
            'name' => 'Jonas',
            'email' => 'jonas@teste.com',
            'password' => Hash::make('teste123'),
        ]);
    }
}
