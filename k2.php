<?php
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$dsn = 'mysql:host=localhost;dbname=procir_hasegawa';
$user = 'hasegawa';
$password = 'wY8MeVfuJy';
if (!empty($name && $mail && $pass)) {
	try {
		$dbh = new PDO($dsn, $user, $password);
		$sql = "INSERT INTO members (name, mail, pass) VALUES ('$name', '$mail', '$pass')";
		$res = $dbh->query($sql);
		if ($res) {
			$members = $res->fetch(PDO::FETCH_ASSOC);
			session_start();
			$_SESSION['id'] = $members['id'];
			$_SESSION['name'] = $members['name'];
			echo '会員登録が完了しました';
			echo '<br><a href="posted_screen.php"> 掲示板へ</a>';
		}
	} catch (PDOException $e) {
		var_dump($e->getMessage());
		exit;
	}
} else {
	echo 'データを正しく入力してください';
}
?>
