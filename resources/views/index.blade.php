<?php

unset($novels[0]); //配列0番目の「allcount」を消す。消さない場合はコメントアウト
//foreachでの出力（一部項目）
echo '【ポイント・作者・タイトルのみ表示】' . EOL;
foreach ($novels as $key => $novel) {
    $dailyPoint = $novel['daily_point'];
    $title = $novel['title'];
    $writer = $novel['writer'];
    echo "{$key}／{$dailyPoint}ポイント／{$writer}／{$title}" . EOL;
}
echo EOL;
//forでの出力（全項目）
echo '【全項目の表示】' . EOL;
for ($i = 1; $i <= count($novels); $i++) {
    print_r($novels[$i]);
    echo EOL;
}
?>
