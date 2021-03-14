<?php
require_once '../functions.php';

try {
    $dbh = dbOpen();
    $sql = "INSERT INTO books (id, title, isbin, price, publish, author) VALUES (NULL, :title, :isbin, :price, :publish, :author)";
    $statement = $dbh->prepare($sql);
    $price = (int)$_POST['price'];
    $statement->bindParam(":title",$_POST['title'],PDO::PARAM_STR);
    $statement->bindParam(":isbin",$_POST['isbin'], PDO::PARAM_STR);
    $statement->bindParam(':price',$price ,PDO::PARAM_INT);
    $statement->bindParam(":publish",$_POST['publish'], PDO::PARAM_STR);
    $statement->bindParam(":author",$_POST['author'], PDO::PARAM_STR);

    $statement->execute();
    echo 'データが追加されました';
    echo '<a href="list.php">一覧表示に戻る </a>';
} catch (PDOException $e){
    echo $e->getMessage();
    exit;
}