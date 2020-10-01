<?php

    $localhost = "localhost";
    $userName = "u182743893_epsy";
    $password = "tyghvb";
    $dbName = "u182743893_epsyos";

    $connect = mysqli_connect($localhost, $userName, $password, $dbName);

    if (mysqli_connect_errno($connect)) {
    		echo 'Failed to connect';
    }

?>