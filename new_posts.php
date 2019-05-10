<?php
session_start();
$user_id = $_SESSION['id'];
if (!isset($user_id)) {
	header('Location: posts_member.php');
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
<body>
<h1>New Posts<h1>
<div id="new_posts">
<form method="POST" action="posts_end.php">
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
<p>Name</p>
<input type="text" name="name" placeholder="Name"/>
<p>Title</p>
<input type="text" name="title" placeholder="Title" />
<p>Comment</p>
<textarea name="text" cols="40" rows="7" maxlength="50" wrap="hard"></textarea>
<br><input type="submit" value="Submit" />
</form>
</div>
</body>
</center>
</html>

