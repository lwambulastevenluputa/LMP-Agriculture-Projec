<?php
session_start();
if (isset($_SESSION['mobilenumber'])) {

    //check connection to db that it is not the first time.

    define("number", $_SESSION['mobilenumber']);
    include('config/db_connect.php');
?>

<?php
    include('config/db_connect.php');

    $msg = "Tap to chat with contact.";
    if (isset($_POST['addcontact_number'])) {
        $a = mysqli_escape_string($connect, $_POST['addcontact_number']);


        // insert the collected data into the database
        $date = date('ymd');
        $time = date('his');
        $ref = $date . $time;
        $date = date('y-m-d');
        $time = date('h:i:s a');


        $query2 = "SELECT * FROM mango_contacts WHERE username='" . number . "' AND contact='" . $a . "' LIMIT 1";

        //Execute the query
        $result2 = mysqli_query($connect, $query2);

        if (mysqli_num_rows($result2) == 0) {
            $query = "INSERT INTO mango_contacts(ref,username,contact,saved_from,approval,date,time) VALUES ('$ref','" . number . "','$a','web','yes','$date','$time')";

            //Execute the query
            mysqli_query($connect, $query);

            // notify user
            if (mysqli_affected_rows($connect) > 0) {
                $msg = "<p>Contact added successfully.</p>";
                header('location: index.php?done');
            } else {
                $msg = "<p>Something has gone wrong with our application. Try later.</p>";
                header('location: index.php?apperror');
            }
        } else {
            $msg = "That contact already exists.";
            header('location: index.php?existerror');
        }
    }
?>

<?php
}
?>