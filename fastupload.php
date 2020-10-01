<?php session_start(); 

if(isset($_SESSION['mobilenumber'])){

//check connection to db that it is not the first time.
define("number",$_SESSION['mobilenumber']); 

//always use name for the username
$number=number;
$name=number;

if(isset($number) && isset($_POST['chatref']) && isset($_POST['contact'])){


if(isset($_FILES["fileToUpload"]["name"])){
$cref=$_POST['chatref'];
$cont=$_POST['contact'];
 
$target_dir="uploads/";
$ref=date('ymdhis');
$target_file=$target_dir.$ref.basename($_FILES["fileToUpload"]["name"]);
$uploadOk=1;
$caption=$_POST["piccaption"];
$file_name=$ref.$_FILES["fileToUpload"]["name"];
$dBfilename=$_FILES["fileToUpload"]["tmp_name"];
$check=filetype($_FILES["fileToUpload"]["tmp_name"]);

//Checkifimagefileisaactualimageorfakeimage
if(isset($_POST["submit"])){;
if($check=="file"){
echo"File is acceptable";
$uploadOk=1;
}else{
echo"File is not accepted.";
$uploadOk=0;
}
}
//Checkiffilealreadyexists
if(file_exists($target_file)){
echo $name.' ';
$uploadOk=0;
}
//Checkfilesize
if($_FILES["fileToUpload"]["size"]>500000000){
echo"Too large ";
$uploadOk=0;
}
//Allowcertainfileformats
if($check=="dir"){echo "Only videos and pictures allowed ";
$uploadOk=0;
}
//Checkif$uploadOkissetto0byanerror
if($uploadOk==0){
echo "Sorry, your file was not uploaded.";
//ifeverythingisok,trytouploadfile
}else{
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
echo "Your file has been uploaded.";

$date=date("y-m-d");
$time=date("h:i:s");
$ref=date('ymdhis');

$dbc=mysqli_connect('localhost','u863218974_root','Rootadmin247','u863218974_mango') or die('error1 connecting to database');
$messages="INSERT INTO mango_conversations(ref,conv_id,username,contact,message,date,time,type,typeext) VALUES ('$cref','$ref','$number','$cont','image','$date','$time','$file_name','image')";
mysqli_query($dbc,$messages) or die('error2 quering database');

$dbc=mysqli_connect('localhost','u863218974_root','Rootadmin247','u863218974_mango') or die('error1 connecting to database');
$messages="INSERT INTO mango_images(ref,username,image,date,time) VALUES ('$ref','$number','$file_name','$date','$time')";
mysqli_query($dbc,$messages) or die('error2 quering database');

header('location: index.php?imguplsucc');
mysqli_close($dbc);

}else{
echo"Sorry,there was an error uploading your file.";
header('location: index.php?imguplerorr');
}
}

}
}
}
?>


