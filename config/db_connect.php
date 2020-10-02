<?php

    $localhost = "localhost";
    $userName = "u863218974_root";
    $password = "Rootadmin247";
    $dbName = "u863218974_mango";

    $connect = mysqli_connect($localhost, $userName, $password, $dbName);

    if (mysqli_connect_errno($connect)) {
    		echo 'Failed to connect';
    }

?>