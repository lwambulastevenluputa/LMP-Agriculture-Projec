<?php 

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "testing";

     /********** Object Oriented *************/ 
    $conn = new mysqli("$servername", "$username", "$password", "$dbname");
    if($conn->connect_error) {
        die("Connection Failed!".$conn->connect_error);
    }


    /************* Procedural ****************/ 
    // create connection
    // $conn = mysqli_connect("$servername", "$username", "", "$dbname");

    /* Check if the connection succeeded */
    // if (!$conn)
    // {
    //    echo 'Connection failed<br>';
    //    echo 'Error number: ' . mysqli_connect_errno() . '<br>';
    //    echo 'Error message: ' . mysqli_connect_error() . '<br>';
    //    die();
    // }
?>