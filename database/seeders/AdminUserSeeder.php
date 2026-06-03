<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'jigrotech@gmail.com'],
            [
                'name' => 'Admin User',
                'phone' => '9999999999',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
            ]
        );
    }
}
