<?php

$localhost = "localhost";
$userName = "root";
$password = "";
$dbName = "u863218974_mango";

$connect = mysqli_connect($localhost, $userName, $password, $dbName);

if (mysqli_connect_errno($connect)) {
    echo 'Failed to connect';
}