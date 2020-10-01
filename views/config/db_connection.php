<?php 

    /************* Procedural ****************/ 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dashboard-sales-management";

    // create connection
    $conn = mysqli_connect("$servername", "$username", "", "$dbname");

    /* Check if the connection succeeded */
    if (!$conn)
    {
       echo 'Connection failed<br>';
       echo 'Error number: ' . mysqli_connect_errno() . '<br>';
       echo 'Error message: ' . mysqli_connect_error() . '<br>';
       die();
    }

    /********** Object Oriented *************/ 
    // $conn = new mysqli("localhost", "root", "", "dashboard-sales-management");
    // if($conn->connect_error) {
    //     die("Connection Failed!".$conn->connect_error);
    // }
    
?>