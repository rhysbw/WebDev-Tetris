<?php
require "connect.php";
include "authenticate.php";
if (isset($_COOKIE['score'])){
    $UserName = $_SESSION['username'];
    $Score = $_COOKIE['score'];
    $sql = "INSERT INTO Scores VALUES(NULL,'".$UserName."','".$Score."');";

    $result = mysqli_query($conn,$sql);
    if ($result){
    }else{
        echo "Error: ".mysqli_error($conn);
    }
    mysqli_close($conn);
    unset($_COOKIE['score']);
    setcookie("score",0,time()-1000);
    header("Location: tetris.php");
}else{
    header("Location: index.php");
}
?>