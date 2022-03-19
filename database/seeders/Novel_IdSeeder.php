<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Novel_IdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('novel_infos')->insert([
            [
                'novel_id' => 1,
                'sentence' => "海賊王に俺はなる",
                'page' => 1,

            ],
            [
                'novel_id' => 2,
                'sentence' => "ここに小説の本文が入ります",
                'page' => 1,

            ],

            [
                'novel_id' => 1,
                'sentence' => "背中の傷は戦士の恥だ",
                'page' => 2,

            ],
            [
                'novel_id' => 1,
                'sentence' => "なぁぁみぃミィみぃみぃみぃぃさーーーん",
                'page' => 3,

            ],

        ]);
    }
}
