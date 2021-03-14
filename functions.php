<?php

/*
 * htmlをエスケープする
 */
function escapeHtml(string $str): string
{
    return htmlspecialchars($str,2,'UTF-8');
}

function dbOpen():PDO
{
    $user = 'phpuser';
    $password = 'dmadmadmadmaD1';
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    return new PDO('mysql:host=localhost;dbname=sample_db',$user,$password,$opt);
}