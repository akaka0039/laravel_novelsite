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
            'name' => 'test',
            'novel_sentence' => '吾輩は猫である。名前はまだない',
            'email' => 'test@test.com',
            'password' => Hash::make('password123'),
            'created_at' => '2023/01/01 11:11:11'
        ]);
    }
}
