<?php 
session_start();
if(isset($_SESSION['mobilenumber'])){
//check connection to db that it is not the first time.
define("number",$_SESSION['mobilenumber']);

include('../config/db_connect.php');
		

if(isset($_POST['replyref'])){
$ra=mysqli_escape_string($connect,$_POST['replyref']);
$ri=mysqli_escape_string($connect,$_POST['replyid']);
$rc=mysqli_escape_string($connect,$_POST['replycontact']);
$rm=mysqli_escape_string($connect,$_POST['replymsg']);

	$date=date('y-m-d');
	$time=date('h:i:s a');
 $query = "INSERT INTO mango_conversations(ref,username,contact,message,date,time,type,replyid) VALUES ('$ra','".number."','$rc','$rm','$date','$time','reply','$ri')";
 
    mysqli_query($connect, $query);
	
 $query1 = "UPDATE mango_chats SET alerts=alerts+1 WHERE ref='$ra'";

    //Execute the query
    mysqli_query($connect, $query1);

header('location: index.php');
}


}
?>
