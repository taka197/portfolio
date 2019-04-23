<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>掲示板</title>
<link rel="stylesheet" href="style.css">
</head>
<center>
<body>
<ul>
<h1>Posted bulletin board</h1>
	<li><a class="#active" href="#home">Home</a></li>
	<li><a href="new_posts.php">New posts</a></li>
	<li><a href="#contact">Posted lists</a></li>
<li><a href="#contact">Contact</a></li>
<li>
<?php
session_start();
if (isset($_SESSION['name'])) {
	echo '<li><a class="logout" href="posts_logout.php">Logout</a></li>';
?>
<p class="login-name">Login Name: <?php echo $_SESSION['name']; ?></p>
<?php
} else {
	echo'<a href="posts_login.php">Login</a>';
}
?>
</li>
</ul>
<div id="title">
<br><br><a href="new_posts.php"> 新規投稿</a></br></br>
<hr>
<h2>Posted Lists</h2>
</hr>
<?php
$dsn = 'mysql:host=localhost;dbname=procir_hasegawa';
$user = 'hasegawa';
$password = 'wY8MeVfuJy';
try {
	$dbh = new PDO($dsn, $user, $password);
	$sql = "SELECT *FROM posted_screen";
	$res = $dbh->query($sql);
	$count = $res->rowCount();
?>
</div>
<table border="1">
<tr>
<th>Posted ID</th>
<th>Name</th>
<th>Title</th>
<?php
	if(isset($_SESSION['name'])) {
		echo '<a href="posts_update.php">編集</a>';
		echo '<br><a href="posts_delete.php">削除</a>';
	}
?>
<th>Comment</th>
<th>Datetime</th>
</tr>
<?php foreach ($res as $value) : ?>
<tr align="center">
<td><?php echo $value['id']; ?></td>
<td><?php echo $value['name']; ?></td>
<td><?php echo $value['title']; ?></td>
<td><?php echo $value['text']; ?></td>
<td><?php echo $value['datetime']; ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php
	if ($count === 0) {
		echo '投稿はまだありません';
	}
?>
<?php
} catch (PDOException $e) {
	var_dump($e->getMessage());
	exit;
}
?>
<form action="#" method="POST">
<Name<input type="name">
<footer>
<p>&copy; 2019-Posted bulletin board</p>
</footer>
</body>
</center>
</html>
