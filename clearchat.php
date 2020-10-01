<?php 
session_start();
if(isset($_SESSION['mobilenumber'])){

//check connection to db that it is not the first time.

define("number",$_SESSION['mobilenumber']);
include('../config/db_connect.php');
echo $_POST['clearchat'];
if(isset($_POST['clearchat'])){

$ref=$_POST['clearchat'];
$date=date('ymd');
	$time=date('his');
	$refid=$date.$time;
	$date=date('y-m-d');
	$time=date('h:i:s a');
$sql_query1="UPDATE mango_conversations SET clear='yes' WHERE ref='".$ref."'";
$result1=mysqli_query($connect,$sql_query1);

    //Execute the query
    header('location: index.php');
}


}
?>
