<?php
session_start();
$_SESSION['session_user'] = "";
$_SESSION['session_pass'] = "";
session_destroy();
header("location:../index.php");
?>