<?php 
session_start();
if(isset($_SESSION['mobilenumber'])){

//check connection to db that it is not the first time.

define("number",$_SESSION['mobilenumber']);
include('../config/db_connect.php');

	$z=0;
	$query2="SELECT * FROM mango_chats WHERE (alerts>0) AND (username='".number."' OR contact='".number."') ORDER BY date DESC";

    //Execute the query
    $result2=mysqli_query($connect, $query2);
	$a = array();
	$b=0;
		if(mysqli_num_rows($result2)>0){
		$c=mysqli_num_rows($result2);
		while($row2=mysqli_fetch_array($result2)){
		if($row2['username']!==number){
		$a[$b]=$row2['username'];
		}else{
		$a[$b]=$row2['contact'];
		}
		$z=$z+$row2['alerts'];

	$query3="SELECT first_name FROM mango_user_credentials WHERE mobile_number='$a[0]' LIMIT 1";

    //Execute the query
    $result3=mysqli_query($connect, $query3);

		while($row3=mysqli_fetch_array($result3)){
		$d = $row3['first_name'];
		}

		}

		$e=$c-1;

		if($z>100){
		$z='100+';
		}

		if($e>0){
		echo $z.' threads - '.$d.' and '.$e.' others have messaged you.';
		}else{
		echo $z.' threads - '.$d.' has messaged you.';
		}
		}else{
		echo 'Checking...';
		}
		}