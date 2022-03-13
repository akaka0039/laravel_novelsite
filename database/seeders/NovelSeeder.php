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
                'novel_ID' => 1,
                'novel_title' => "シャーロック・ホームズの冒険",
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",

            ],
            [
                'novel_ID' => 2,
                'novel_title' => "海の見える街",
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",
            ],
            [
                'novel_ID' => 2,
                'novel_title' => "秘密",
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",

            ],
            [
                'novel_ID' => 1,
                'novel_title' => "ワンピース",
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",

            ],
            [
                'novel_ID' => 1,
                'novel_title' => "自由",
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",
                // 'type' => '',
            ],
        ]);
    }
}
