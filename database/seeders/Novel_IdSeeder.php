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
                'page' => 1,
                'subtitle' => "始まり",
                'episode' => "海賊王に俺はなる",


            ],
            [
                'novel_id' => 2,
                'page' => 1,
                'subtitle' => "ここにサブタイトルが入ります",
                'episode' => "ここに小説の本文が入ります",


            ],

            [
                'novel_id' => 1,
                'page' => 2,
                'subtitle' => "副船長の宣言",
                'episode' => "背中の傷は戦士の恥だ",


            ],
            [
                'novel_id' => 1,
                'page' => 3,
                'subtitle' => "あほ",
                'episode' => "なぁぁみぃミィみぃみぃみぃぃさーーーん
                それが彼の最後の言葉だった",


            ],

            [
                'novel_id' => 3,
                'page' => 1,
                'subtitle' => "何度でも",
                'episode' => "努力は勝つ",


            ],

            [
                'novel_id' => 3,
                'page' => 2,
                'subtitle' => "何度でも",
                'episode' => "努力は勝つ",


            ],



            [
                'novel_id' => 4,
                'page' => 1,
                'subtitle' => "テストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよ",
                'episode' => "テストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよテストだよ",


            ],

            [
                'novel_id' => 5,
                'page' => 1,
                'subtitle' => "書き方バカっぽい
                ",
                'episode' => "テストは大変だが大切ですです
                なぜならエラーになると家に帰れなくなるからです",

            ],

            [
                'novel_id' => 6,
                'page' => 1,
                'subtitle' => "書き方バカっぽい
                けどバカだから仕方ない",
                'episode' => "テストは大変だが大切ですです
                なぜならエラーになると家に帰れなくなるからです",

            ],

        ]);
    }
}
