<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Posts</title>
<link rel="stylesheet" href="style.css">
</head>
<center>
<body>
<ul>
<h1>Posted bulletin board</h1>
	<li><a class="#active" href="#home">Home</a></li>
	<li><a href="new_posts.php">New posts</a></li>
	<li><a href="#posted_lists">Posted lists</a></li>
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
<?php
if (isset($_SESSION['id'])) {
	echo '<p class="welcome">Welcome</p>';
}
?>
<div id="title">
<hr class="hr1">
<div id="posted_lists">
<h2>Posted Lists</h2>
</hr>
<?php
$dsn = 'mysql:host=localhost;dbname=procir_hasegawa';
$user = 'hasegawa';
$password = 'wY8MeVfuJy';
try {
	$dbh = new PDO($dsn, $user, $password);
	$sql1 = "SELECT * FROM posted_screen";
	$res1 = $dbh->query($sql1);
	$count = $res1->rowCount();
?>
</div>
<table border="1">
<tr>
<th>Posted ID</th>
<th>Name</th>
<th>Title</th>
<th>Comment</th>
<th>Datetime</th>
</tr>
<?php foreach ($res1 as $value) : ?>
<tr align="center">
<td><?php echo $value['id']; ?></td>
<td><?php echo $value['name']; ?></td>
<td><?php echo $value['title']; ?></td>
<td><?php echo $value['text']; ?></td>
<td><?php echo $value['datetime']; ?></td>

<?php
	if (isset($_SESSION['id']))
		if ($value['user_id'] === $_SESSION['id']) : ?>
<td>
</form>
<form action="posts_delete.php" method="POST">
<input type="hidden" name="id" value="<?php echo $value['id']; ?>" />
<input type="submit" value="Delete" />
</form>
</td>
<?php endif; ?>
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
</div>
<p class="border"></p>
<h3 class="contact-title">Contact</h3>
<div id="contact">
<form  action="contact.php" method="POST">
<p class="contact-name">Name</p>
<p><input type="name" name="name" /></p>
<p class="contact-mail"><p>Mail</p>
<input type="mail" name="mail" /></p>
<p class="contact-comment">Comment</p>
<textarea type="text" name="text" cols="40" rows="7"></textarea>
<br><input type="submit" value="submit" />
</form>
</div>
<footer>
<p>&copy; 2019-Posted bulletin board</p>
</footer>
</body>
</center>
</html>

