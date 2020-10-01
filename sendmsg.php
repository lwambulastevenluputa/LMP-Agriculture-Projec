<?php 
session_start();
if(isset($_SESSION['mobilenumber'])){

//check connection to db that it is not the first time.

define("number",$_SESSION['mobilenumber']);
include('../config/db_connect.php');
echo $_POST['convuser'];
echo $_POST['convusermsg'];
echo $_POST['convref'];
if(isset($_POST['convuser']) && isset($_POST['convusermsg']) && $_POST['convusermsg']!=='' && $_POST['convusermsg']!==' ' && isset($_POST['convref'])){
    echo 'fdd';
$user=$_POST['convuser'];
$msg=$_POST['convusermsg'];
$ref=$_POST['convref'];
$date=date('ymd');
	$time=date('his');
	$refid=$date.$time;
	$date=date('y-m-d');
	$time=date('h:i:s a');
$sql_query1="INSERT INTO mango_conversations(ref,conv_id,username,contact,message,date,time) VALUES ('$ref','$refid','".number."','$user','$msg','$date','$time')";
$result1=mysqli_query($connect,$sql_query1);

 $query1 = "UPDATE mango_chats SET alerts=alerts+1 WHERE ref='$ref'";
?>
<script>
startsound();
</script>
<?php
    //Execute the query
    mysqli_query($connect, $query1);
}


}
?>
