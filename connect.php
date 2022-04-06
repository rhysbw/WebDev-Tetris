<?php
//this connects to the database
$conn = mysqli_connect("localhost","ecm1417","WebDev2021","tetris");

if (mysqli_connect_errno()){
    echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

?>