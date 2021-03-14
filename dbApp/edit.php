<?php
require_once '../functions.php';

$id = $_GET['id'];
if(empty($id)){
    echo 'idを指定してください';
    exit;
}


try{
    $dbh = dbOpen();
    $stmt = $dbh->prepare("SELECT * FROM books WHERE id =:id");
    $stmt->bindParam(':id',$id,PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$row){
       echo 'データが存在しません';
       exit;
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<html >
<head>
    <meta charset="UTF-8">
    <title>MAMP</title>

</head>
<body>
<h1>編集</h1>
<form action="update.php" method="post">
    <input type="hidden" name="id" value=<?= $row['id'] ?>>
<p>
    <label for="title">タイトル</label>
    <input type="text" id="title" name="title" value=<?= $row['title']?>>
</p><p>
    <label for="author">作者名</label>
    <input type="text" id="author" name="author" value=<?= $row['author']?>>
</p><p>
    <label for="price">値段</label>
    <input type="text" id="price" name="price" value=<?= $row['price']?>>
</p>
    <p>
        <input type="submit" value="送信">
    </p>
</form>
</body>

</html>
