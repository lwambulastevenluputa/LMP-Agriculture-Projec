<?php 
session_start();
if(isset($_SESSION['mobilenumber'])){

//check connection to db that it is not the first time.

define("number",$_SESSION['mobilenumber']);
include('../config/db_connect.php');

?>






<?php
$msg="Tap to chat with contact.";
if(isset($_POST['addcontact_number'])){
$a=mysqli_escape_string($connect,$_POST['addcontact_number']);


    // insert the collected data into the database
	$date=date('ymd');
	$time=date('his');
	$ref=$date.$time;
	$date=date('y-m-d');
	$time=date('h:i:s a');
	
	
	$query2="SELECT * FROM mango_contacts WHERE (username='".number."' AND contact='".$a."') OR (contact='".number."' AND username='".$a."') AND LIMIT 1";

    //Execute the query
    $result2=mysqli_query($connect, $query2);
	
		if(mysqli_num_rows($result2)==0){
    $query = "INSERT INTO mango_contacts(ref,username,contact,saved_from,approval,date,time) VALUES ('$ref','".number."','$a','web','yes','$date','$time')";

    //Execute the query
    mysqli_query($connect, $query);

    // notify user
    if (mysqli_affected_rows($connect) > 0) {
    	$msg="<p>Contact added successfully.</p>";
header('location: index.php?done');
    } else {
    	$msg="<p>Something has gone wrong with our application. Try later.</p>";
header('location: index.php?apperror');
    }


}else{
$msg="That contact already exists.";
header('location: index.php?existerror');
}

}
?>





<?php

if(isset($_GET['c'])){
$a=mysqli_escape_string($connect,$_GET['c']);


    // insert the collected data into the database
	$date=date('ymd');
	$time=date('his');
	$ref=$date.$time;
	$date=date('y-m-d');
	$time=date('h:i:s a');
	
	
	$query4="SELECT * FROM mango_user_credentials WHERE ref='$a' LIMIT 1";
    //Execute the query
    $result4=mysqli_query($connect, $query4);
	
		if(mysqli_num_rows($result4)>0){
	
$row4=mysqli_fetch_array($result4);
$a=$row4['mobile_number'];

	$query2="SELECT * FROM mango_chats WHERE username='".number."' AND contact='".$a."' AND visible!=no LIMIT 1";

    //Execute the query
    $result2=mysqli_query($connect, $query2);
	
		if(mysqli_num_rows($result2)==0){
    $query = "INSERT INTO mango_chats(ref,username,contact,date,time) VALUES ('$ref','".number."','$a','$date','$time')";

    //Execute the query
    mysqli_query($connect, $query);

    // notify user
    if (mysqli_affected_rows($connect) > 0) {
	header('location: index.php?csucc');
$startchat=$a;

    } else {
    header('location: index.php?error');
    }

}else{

$startchat=$a;
header('location: index.php?error');

}

}
}


?>



<?php

if(isset($_POST['c'])){
$a=mysqli_escape_string($connect,$_POST['c']);


    // insert the collected data into the database
	$date=date('ymd');
	$time=date('his');
	$ref=$date.$time;
	$date=date('y-m-d');
	$time=date('h:i:s a');
	
	
	$query4="SELECT * FROM mango_user_credentials WHERE ref='$a' LIMIT 1";
    //Execute the query
    $result4=mysqli_query($connect, $query4);
	
		if(mysqli_num_rows($result4)>0){
	
$row4=mysqli_fetch_array($result4);
$a=$row4['mobile_number'];

	$query2="SELECT * FROM mango_chats WHERE username='".number."' AND contact='".$a."' AND visible!=no LIMIT 1";

    //Execute the query
    $result2=mysqli_query($connect, $query2);
	
		if(mysqli_num_rows($result2)==0){
    $query = "INSERT INTO mango_chats(ref,username,contact,date,time) VALUES ('$ref','".number."','$a','$date','$time')";

    //Execute the query
    mysqli_query($connect, $query);

    // notify user
    if (mysqli_affected_rows($connect) > 0) {
	header('location: index.php?csucc');
$startchat=$a;

    } else {
    header('location: index.php?error');
    }

}else{

$startchat=$a;
header('location: index.php?error');

}

}
}


header('location: index.php?error');


}
?>