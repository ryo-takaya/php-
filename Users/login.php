<?php
require_once __DIR__ .'/../functions.php';
session_start();
//if (!empty($_SESSION['login'])) {
//    echo 'ログイン済みです';
//    echo '<a href="/dbApp/list.php"></a>';
//    exit;
//}

//if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
//    echo 'ユーザーネームかパスワードを入力してください';
//    exit;
//}
//$pass = password_hash($_POST['password'],PASSWORD_DEFAULT);

try{
    $dbh = dbOpen();
    $stmt = $dbh->prepare('select password from users where username = :username');
    $stmt->bindParam(':username',$_POST['username']);
    $stmt->execute();
    $result = $stmt->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

if (!$result) {
    echo 'ログイン情報が正しくありません';
    exit;
} else if(password_verify($_POST['password'], $result['password'])){
    session_regenerate_id(true);
    $_SESSION['login'] = true;
    header('Location: http://localhost:8888/dbApp/list.php');
}


echo '間違っています';

?>

<html >
<head>
    <meta charset="UTF-8">
    <title>MAMP</title>
</head>
<body>
<form method="post" action="login.php">
    <p>
        <label for="">username</label>
        <input type="text" id="username" name="username">
    </p>
    <p>
        <label for="">password</label>
        <input type="password" id="username" name="password">
    </p>
    <p>
        <input type="submit" name="submit">
    </p>
</form>
</body>