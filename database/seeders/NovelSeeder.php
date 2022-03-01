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
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",

            ],
            [
                'novel_ID' => 2,
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",
            ],
            [
                'novel_ID' => 2,
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",

            ],
            [
                'novel_ID' => 1,
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",

            ],
            [
                'novel_ID' => 1,
                'information' => "ここに説明文が入ります",
                'sentence' => "ここに小説の本文が入ります",
                // 'type' => '',
            ],
        ]);
    }
}
