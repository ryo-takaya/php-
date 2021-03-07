<?php

require_once '../functions.php';

$height = $_POST['height'];
$height = (float)escapeHtml($height);

if ($height === 0.0) {
   echo '無効な入力値です';
   exit;
}

if ($height > 3) {
    echo 'm単位で入力をしてください';
    exit;
}

echo 'あなたの適性体重は'. $height * $height * 22 .'です';