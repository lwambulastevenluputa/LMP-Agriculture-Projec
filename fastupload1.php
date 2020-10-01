<?php session_start(); 

if(isset($_SESSION['mobilenumber'])){

//check connection to db that it is not the first time.
define("number",$_SESSION['mobilenumber']); 

//always use name for the username
$number=number;
$name=number;

if(isset($number) && isset($_POST['chatref1']) && isset($_POST['contact1'])){


if(isset($_FILES["fileToUpload1"]["name"])){
$cref=$_POST['chatref1'];
$cont=$_POST['contact1'];
 
$target_dir="uploads/";
$ref=date('ymdhis');
$target_file=$target_dir.$ref.basename($_FILES["fileToUpload1"]["name"]);
$uploadOk=1;
$caption=$_POST["vidcaption"];
$file_name=$ref.$_FILES["fileToUpload1"]["name"];
$dBfilename=$_FILES["fileToUpload1"]["tmp_name"];
$check=filetype($_FILES["fileToUpload1"]["tmp_name"]);

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
if($_FILES["fileToUpload1"]["size"]>50000000){
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
if(move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"],$target_file)){
echo "Your file has been uploaded.";

$date=date("y-m-d");
$time=date("h:i:s");
$ref=date('ymdhis');



$dbc=mysqli_connect('localhost','u863218974_root','Rootadmin247','u863218974_mango') or die('error1 connecting to database');
$messages="INSERT INTO mango_conversations(ref,conv_id,username,contact,message,date,time,type,typeext) VALUES ('$cref','$ref','$number','$cont','video','$date','$time','$file_name','video')";
mysqli_query($dbc,$messages) or die('error2 quering database');

$dbc=mysqli_connect('localhost','u863218974_root','Rootadmin247','u863218974_mango') or die('error1 connecting to database');
$messages="INSERT INTO mango_videos(ref,username,video,date,time) VALUES ('$ref','$number','$file_name','$date','$time')";
mysqli_query($dbc,$messages) or die('error2 quering database');

header('location: index.php?viduplsucc');
mysqli_close($dbc);

}else{
echo"Sorry,there was an error uploading your file.";
header('location: index.php?viduplerorr');
}
}

}
}
}
?>


