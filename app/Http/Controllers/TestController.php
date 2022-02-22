<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {

        define("EOL", "\n\r<br>"); //改行を簡略化(End Of Line)
        $filePath = "./novels.dat";     //入力①
        $order = "dailypoint";          //入力②
        $limit = 5;                     //入力③
        $myUserAgent = "Your UserAgent"; //入力④
        // ファイルが無い場合のみAPIを読み込む
        if (!file_exists($filePath)) {
            echo "APIにアクセスして情報をファイルに保存します。相対パス：「{$filePath}」" . EOL . EOL;
            $url = "https://api.syosetu.com/novelapi/api/?out=php&order={$order}&lim={$limit}";
            $option = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "User-Agent:" . $myUserAgent
                )
            );
            $context = stream_context_create($option);
            $novels = unserialize(file_get_contents($url, false, $context)); //APIから取得
            sleep(3); //API負荷防止、3秒スリープ
            file_put_contents($filePath, serialize($novels)); //ローカルに保存
            // ファイルがあればローカルから読み込む
        } else {
            echo "APIにアクセスせずファイルから読み込みます。相対パス：「{$filePath}」" . EOL . EOL;
            $novels = unserialize(file_get_contents($filePath));
        }













        // // なろう小説APIサンプルプログラム「小説簡易一覧(PHP)」

        // // APIのオプションパラメータを連想配列で指定
        // $params["out"] = "json";
        // $params["lim"] = 10;
        // $params["gzip"] = 5;
        // $params["order"] = "new";

        // // APIのエンドポイント(URL)を指定
        // $url = "https://api.syosetu.com/novelapi/api/?" . http_build_query($params, null, "&");

        // // ユーザエージェントが設定されていないクライアントからのアクセスは403エラーを返す
        // // そのため、未設定の場合はPHPを名乗る

        // $options["http"]["header"][] = "User-Agent: PHP";
        // $context = stream_context_create($options);


        // // APIを利用してデータを取得
        // $file = file_get_contents($url, false, $context);



        // // 取得した圧縮データを解凍
        // $file = gzdecode($file);



        // var_dump(json_decode($file, true));
        // // JSON形式のデータをデコード
        // $listarray = json_decode($file, true);

        // dd($listarray);

        return view(
            'index',
            compact('novels')
        );
    }
}
