<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// To connect DB
use Illuminate\Support\Facades\DB;
// To adapt Hash
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'テラテラ',
                'email' => 'test@test2.com',
                'password' => Hash::make('password123'),
            ],

            [
                'name' => 'りと',
                'email' => 'test@test3.com',
                'password' => Hash::make('password123'),
            ],

        ]);
    }
}
