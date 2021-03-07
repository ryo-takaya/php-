<?php

if (!isset($_GET['zip'])) {
    header('Location: zip.html');
    exit;
}
$res = file_get_contents('https://zipcloud.ibsnet.co.jp/api/search?zipcode='. $_GET['zip']);
$encode = json_decode($res,true);


if (strlen($encode['message'])) {
   echo '郵便番号が存在しません';
   exit;
}

 echo $encode['results'][0]['prefcode'];
 echo $encode['results'][0]['address1'];
 echo $encode['results'][0]['address2'];