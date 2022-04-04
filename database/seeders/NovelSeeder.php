<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('novels')->insert([
            [
                'novel_id' => 1,
                'user_id' => 1,
                'novel_title' => "ワンピース",
                'novel_information' => "一つなき秘宝を求める物語",
            ],
            [
                'novel_id' => 2,
                'user_id' => 2,
                'novel_title' => "大きな栗の木下",
                'novel_information' => "ここに説明文が入ります",
            ],
            [
                'novel_id' => 3,
                'user_id' => 1,
                'novel_title' => "何度でも何度でも",
                'novel_information' => "何度でも頑張る",
            ],


        ]);
    }
}
