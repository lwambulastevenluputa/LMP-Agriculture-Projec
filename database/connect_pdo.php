<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agritech_market";

    //database_connection.php
    $connect = new PDO("mysql:host=$servername; dbname=$dbname", "$username", "$password");
?>