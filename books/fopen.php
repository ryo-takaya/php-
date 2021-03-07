<?php

//データを読み込む
$fp = fopen('bookdata.csv','r');
if (!$fp) {
    echo 'ファイルの書き込みに失敗しました';
    exit;
}
while ($row = fgetcsv($fp)) {
    echo $row[0]."<br>";
    echo $row[4]."<br><br>";
}




