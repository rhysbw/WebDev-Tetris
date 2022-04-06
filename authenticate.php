<?php
session_start();
setcookie("username", $_SESSION["username"],time()+3600);
if (!isset($_SESSION["username"])){
    header("Location: index.php");
    exit();
}
?>