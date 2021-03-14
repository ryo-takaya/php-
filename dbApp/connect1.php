<?php


try {
    $user = 'phpuser';
    $password = 'dmadmadmadmaD1';
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=sample_db',$user,$password,$opt);
    var_dump($dbh);

} catch (PDOException $e){
    echo $e->getMessage();
    exit;
}
