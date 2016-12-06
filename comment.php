<?php

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

$sql = "select * from commentList ORDER BY createdAt DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

		<?php foreach ($rows as $comment): ?> 
			<hr>
			<?php echo $comment['name']; ?> <?php echo $comment['createdAt']; ?><br>
			<?php echo $comment['comment']; ?>
		<?php endforeach ?>
