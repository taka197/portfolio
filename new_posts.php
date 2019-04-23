<?php
session_start();
if (!isset($_SESSION['name'])) {
	header('Location: k1.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charest="utf-8">
<title>New Posts</title>
<link rel="stylesheet"href="style.css">
</head>
<center>
<div id="new_posts">
<body>
<h1>Posted bulletin board</h1>
<h2>New posts</h2>
<form method="POST" action="posts_end.php">
<p>Name</p>
<input type="text" name="name" />
<p>Title</p>
<input type="text" name="title" />
<p>Comment</p>
<textarea name="text" cols="30" rows="3" maxlength="80" wrap="hard"></textarea>
<br><br><input type="submit" value="Submit" />
</form>
</body>
</div>
</center>
</html>

