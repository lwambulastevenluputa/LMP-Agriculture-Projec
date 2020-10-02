<?php
/*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agritech_market";
*/

    $servername = "localhost";
    $username = "u863218974_root";
    $password = "Rootadmin247";
    $dbname = "u863218974_mango";
    
    try {
        //database_connection.php
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }
    
?>