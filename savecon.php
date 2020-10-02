<?php
include("../config/db_connect.php");
if(isset($_POST['user']) && isset($_POST['msg'])){
$user=$_POST['user'];
$msg=$_POST['msg'];
$date=date('y-m-d');
$time=date('h:i:s a');
$sql_query1="INSERT INTO mango_helpdesk(username,contact,message,date,time) VALUES ('$user','helpdesk','$msg','$date','$time')";
$result1=mysqli_query($connect,$sql_query1);
if(mysqli_affected_rows($connect)){
echo 'message sent';
}else{
echo 'message wasnt sent';
}


}