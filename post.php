<?php

$name = $_POST['name'];
$comment = $_POST['comment'];

define('DSN','mysql:host=localhost;dbname=ajax;charset=utf8;');
define('USER','root');
define('PASSWORD','root');

try {
	$dbh = new PDO(DSN, USER, PASSWORD);
        // echo '成功しました！';
} 
	catch (PDOException $e) {
		echo $e->getMessage();
		exit;
}

$sql = "insert into commentList (name, comment) values (:name,:comment)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":comment", $comment);
$stmt->execute();

?>
