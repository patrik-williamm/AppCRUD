<?php session_start();

$_SESSION = [];
unset($_SESSION['email']);
unset($_SESSION['nama']);
unset($_SESSION['submit']);
session_unset();
session_destroy();

setcookie("keyid", $dt['id'], time()-360000);
setcookie("setkey", hash("haval160,4",$dt['nama']), time()-360000);

header('location: index.php');
exit();