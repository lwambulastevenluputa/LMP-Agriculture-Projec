
<?php 

if(isset($_GET['start'])){
$start=$_GET['start'];
$limit=$start*60;
}else{
$start=1;
$limit=0;
}

include('../config/db_connect.php');

$sql_query2="SELECT * FROM mango_contacts WHERE username='".number."'"; 
$result2=mysqli_query($connect,$sql_query2);
$num=mysqli_num_rows($result2);

$sql_query1="SELECT * FROM mango_contacts WHERE username='".number."' LIMIT $limit,60";
$a=1;
$b=0;
$reg=0;
$active=0;
$result1=mysqli_query($connect,$sql_query1);
if(mysqli_num_rows($result1)>0){
?>
<table style="width:100%; table-layout:fixed; height:100%">
<?php
while($row1=mysqli_fetch_array($result1)){
$user=$row1['contact'];
$sql_query3="SELECT * FROM mango_user_credentials WHERE mobile_number='$user' LIMIT 1";
$result3=mysqli_query($connect,$sql_query3);

if(mysqli_num_rows($result3)>0){
$row2=mysqli_fetch_array($result3);
if($row2['active']=='yes'){ // $active active logged in user
$active=1;
}

$reg=1;
$mob_number = $row1['contact'];
$mob_ref = $row2['ref'];
$mob_name = $row2['first_name'].' '.$row2['last_name'];
}


?>
<tr style="vertical-align:middle" align="center">
<td style="padding:10px">
<table style="width:100%; color:#fff; font-size:12px; font-family:segoe ui; background:none">
<tr align="center" style="height:100px">
<td style="width:50%">
<?php
if($reg==1){
?>

<!--
submit to contacts then redirect to index
-->

<a href="index.php?c=<?php echo $mob_ref; ?>">
<?php
}
?>
<div style="min-height:90px; background:none; border-radius:5px; min-width:90px; color:#fff">
<img src="img/Mango.jpg" style="width:60px; background:none; height:60px; margin-bottom:5px; margin-top:5px; border-radius:50%; <?php if($active==1){echo 'border:5px #f60 solid';}else{echo 'border:5px #555 solid';}
?> "/>
<br>
<?php
if($reg==1){
?>
<small style="font-size:12px; color:#000; text-transform:capitalize"><?php if(strlen($mob_name)<30){echo $mob_name;}else{echo substr($mob_name,0,50).'...';} ?></small>
<br />
<small style="font-size:12px; color:#000; text-transform:capitalize"><?php if(strlen($mob_number)<30){echo $mob_number;}else{echo substr($mob_number,0,50).'...';} ?></small>
<?php
}else{
?>
<br />
<small style="font-size:12px; color:#000; background:#f60; color:#fff; padding:5px; border-radius:5px; text-transform:capitalize">Not On Mango</small>
<?php
}
?>
</div>
<?php
if($reg==1){
?>
</a>
<?php
}
?>
</td>
</tr>
</table>
</td>
</tr>
<?php

$reg=0;
$active=0;
$a=$a+1;
}

?>
</table>

	<div align="center" style="width:100%; padding-top:5px; height:35px">
				<a href="contacts.php?start=<?php echo $start+1; ?>">
				<input type="submit" style="width:140px; height:30px; color:#070; background:#fff; border-radius:5px; border:1px #999 solid" value="Load More"/>
				</a>
				</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php

}else{
echo 'No contacts available yet.';
}

?>