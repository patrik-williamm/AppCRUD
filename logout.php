<?php session_start();

$_SESSION = [];
// unset($_SESSION['email']);
session_unset();
session_destroy();

header('location: index.php');
exit();