<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'test1@example.com'],
            [
                'name' => 'テストユーザー1',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'test2@example.com'],
            [
                'name' => 'テストユーザー2',
                'password' => Hash::make('password'),
            ]
        );
    }
}
