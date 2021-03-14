<?php
  require_once '../functions.php';

if (empty($_POST['id'])) {
  echo 'idが設定されていません';
}
if (empty($_POST['title'])) {
    echo 'titleが設定されていません';
}
if (empty($_POST['author'])) {
    echo 'authorが設定されていません';
}
if (empty($_POST['price'])) {
    echo 'priceが設定されていません';
}


  try{
     $dbh = dbOpen();
     $stmt = $dbh->prepare("UPDATE books SET title=:title, author=:author, price=:price WHERE id=:id");
     $id = (int)$_POST['id'];
     $stmt->bindParam(':title',$_POST['title']);
     $stmt->bindParam(':author',$_POST['author']);
     $stmt->bindParam(':price',$_POST['price']);
     $stmt->bindParam(':id',$id,PDO::PARAM_INT);
     $stmt->execute();
     echo "編集に成功しました";
     echo '<a href="list.php">一覧に戻る</a>';
  } catch (PDOException $e) {
      $e->getMessage();
  }

