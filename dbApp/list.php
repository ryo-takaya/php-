<?php
require_once '../functions.php';

try {
$dbh = dbOpen();
$sql = 'select * from books';
$statement = $dbh->query($sql);
} catch (PDOException $e){
echo $e->getMessage();
exit;
}
?>
<html >
<head>
    <meta charset="UTF-8">
    <title>MAMP</title>

</head>


<?php
try{while ($row = $statement->fetch()): ?>
    <a href="edit.php?id=<?php echo $row['id'] ?>">
      <?php echo "id:".$row[0]."title".$row['title']."</br>" ?>
    </a>
<?php endwhile;?>
<?php
} catch(PDOException $e ){
    echo $e->getMessage();
} ?>

</html>
