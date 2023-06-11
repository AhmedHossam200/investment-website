<?php
session_start();
unset($_SESSION['user_id3']);
unset($_SESSION['user_name3']);
unset($_SESSION['user_idap']);

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
?>
