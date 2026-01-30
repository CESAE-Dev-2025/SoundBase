<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@soundbase.com',
            'password' => Hash::make('admin@soundbase.com'),
            'user_type' => UserType::ADMIN
        ]);
        User::create([
            'name' => 'Leandro Gabriel',
            'email' => 'leandro@gmail.com',
            'password' => Hash::make('leandro@gmail.com'),
            'user_type' => UserType::USER
        ]);
    }
}
