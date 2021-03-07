<?php

require_once '../functions.php';

$height = $_POST['height'];
$weight = $_POST['weight'];
$height = (float)$height;
$weight = (float)$weight;


if ($height === 0.0 && $weight === 0.0) {
   echo '無効な入力値です';
   exit;
}

if ($height > 3) {
    echo 'm単位で入力をしてください';
    exit;
}

if ($weight > 200) {
    echo '体重を正しく入力してください';
    exit;
}

$expectWeight = $height * $height * 22;
$isWeight = $expectWeight < $weight;
$mark = $isWeight?'-': "+";
$diff = abs($expectWeight - $weight);

echo 'あなたの適正体重は'. $expectWeight. 'です';
echo '適正体重まで'.$mark .$diff. 'です';

