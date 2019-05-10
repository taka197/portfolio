<?php
$name = $_POST['name'];
$title = $_POST['title'];
$text = $_POST['text'];
$user_id = $_POST['user_id'];
$dsn = 'mysql:host=localhost;dbname=procir_hasegawa';
$user = 'hasegawa';
$password = 'wY8MeVfuJy';
try {
	if (!empty($name && $title && $text && $user_id)) {
		$dbh = new PDO($dsn, $user, $password);
		$sql = "INSERT INTO posted_screen (user_id, name, title, text) VALUES ('$user_id', '$name', '$title', '$text')";
		$res = $dbh->query($sql);
		echo '投稿が完了しました';
		echo '<br><br><a href="posted_screen.php">ホームに戻る</a>';
	} else {
		echo '入力に誤りがあります';
		echo '<br><br><a href="new_posts.php">投稿画面に戻る</a>';
	}
} catch (PDOException $e) {
	var_dump($e->getMessage());
	exit;
}
?>
