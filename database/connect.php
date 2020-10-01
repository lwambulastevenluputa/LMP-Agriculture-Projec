<?php
/*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agritech_market";
*/
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u863218974_mango";
    
    /************* Procedural ****************/ 
    // create connection
    $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");

    /* Check if the connection succeeded */
    if (!$conn)
    {
       echo 'Connection failed<br>';
       echo 'Error number: ' . mysqli_connect_errno() . '<br>';
       echo 'Error message: ' . mysqli_connect_error() . '<br>';
       die();
    }