<?php
session_start();
$_SESSION["roles"] = 0;
header('Location: login.php');

?>