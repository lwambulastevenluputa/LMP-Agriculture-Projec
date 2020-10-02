
<?php 

$conn=mysqli_connect('localhost','u863218974_root','Rootadmin247','u863218974_mango'); 
$sql_query2="SELECT * FROM applist"; 
$result2=mysqli_query($conn,$sql_query2);
$num=mysqli_num_rows($result2);

$conn=mysqli_connect('localhost','u863218974_root','Rootadmin247','u863218974_mango'); 
$sql_query1="SELECT * FROM applist LIMIT 60";
$a=1;
$b=0;
$result1=mysqli_query($conn,$sql_query1);
if(mysqli_num_rows($result1)>0){
?>
<table style="width:100%; table-layout:fixed; height:100%">
<?php
while($row1=mysqli_fetch_array($result1)){
$appname = $row1['appname'];

if($a==1){
echo '<tr>';
}
?>

<td style="width:200px; padding:10px">
<table style="width:100%; color:#fff; font-size:12px; font-family:segoe ui; background:none">
<tr align="center" style="height:100px">
<td style="width:50%">
<a href="store_review.php?i=">
<div style="min-height:90px; background:none; border-radius:5px; width:90px; color:#fff">
<img src="img/Mango.jpg" style="width:90px; background:none; height:90px; margin-bottom:5px; margin-top:5px; border-radius:5px"/>
<br>
<small style="font-size:12px; text-transform:capitalize"><?php if(strlen($appname)>50){echo $appname;}else{echo substr($appname,0,50).'...';} ?></small>
</div>
</a>
</td>
</tr>
</table>
</td>

<?php 
if($a%6==0){
echo '</tr>';
}

$a=$a+1;
}

?>
</table>

	<div align="center" style="width:100%; border-bottom:1px #ddd solid; padding-top:5px; height:35px">
				<span style="color:#f60; font-size:12px; float:left; margin-top:10px; margin-left:10px"><?php echo $num; ?> More</span>
				<input type="submit" style="width:140px; height:30px; color:#070; background:#fff; border-radius:5px; border:1px #999 solid" value="Load More"/>
				</div>

<?php

}else{
echo 'No products available.';
}

?>