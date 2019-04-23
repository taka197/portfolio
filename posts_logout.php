<?php
session_start();
$_SESSION = array();
session_destroy();
echo 'ログアウトしました';
?>
<br><br><a href="posted_screen.php">掲示板に戻る</a>
