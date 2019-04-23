<?php
$name = $_POST['name'];
$title = $_POST['title'];
$text = $_POST['text'];
$dsn = 'mysql:host=localhost;dbname=procir_hasegawa';
$user = 'hasegawa';
$password = 'wY8MeVfuJy';
try {
	if (!empty($name && $title && $text)) {
	$dbh = new PDO($dsn, $user, $password);
	$sql = "INSERT INTO posted_screen (name, title, text) VALUES ('$name', '$title', '$text')";
	$res = $dbh->query($sql);
	session_start();
	$sql2 = "SELECT * FROM members";
	$res2 = $dbh->query($sql2);
	$memberes = $res2->fetch(PDO::FETCH_ASSOC);
	echo '投稿が完了しました';
	echo '<br><a href="posted_screen.php">掲示板に戻る</a>';
	} else {
		echo 'データを全て入力してください';
		echo '<br><a href="new_posts.php"> 投稿画面に戻る</a>';
	}
} catch (PDOException $e) {
	var_dump($e->getMessage());
	exit;
}
?>
