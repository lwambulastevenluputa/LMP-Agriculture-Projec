<?php 
session_start();
if(isset($_SESSION['user_name'])){
//check connection to db that it is not the first time.
define("number",$_SESSION['user_name']);

include('../config/db_connect.php');
		
		function profimg($a){

include('../config/db_connect.php');
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='$a' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['photo']!=='' && $row5['photo']!==' '){
		$photo='uploads/'.$row5['photo'];
		 }else{
		$photo='img/profile.png'; 
		 }
		 }else{
		$photo='img/profile.png';
		 }
		 }else{
		$photo='img/profile.png';
		 }
		 
		 echo $photo;
		 }
		 
if(isset($_POST['user'])){
$a=mysqli_escape_string($connect,$_POST['user']);

$query2="SELECT * FROM mango_chats WHERE (username='".number."' OR contact='".number."') AND (ref='$a') ORDER BY id DESC LIMIT 300";


    //Execute the query
    $result2=mysqli_query($connect, $query2);
	
		if(mysqli_num_rows($result2)>0){
		
		while($row2=mysqli_fetch_array($result2)){
		$a=$row2['ref'];
		?>
                    <div>
                        <div id="convlog" class="message">
							<ul id="myUL" 
							style="margin-bottom:70px; 
							padding-bottom:70px">
							
									<?php
					$strt=0;				
					$query5="SELECT * FROM mango_conversations WHERE ref='$a'";
					$result5=mysqli_query($connect, $query5);
				    $strt=mysqli_num_rows($result5);
				    
				    if($strt>350){
				    $strt=$strt-300;
				    }else{
				    $strt=0;
				    }
				    
					$query2="SELECT * FROM mango_conversations WHERE ref='$a' ORDER BY id ASC LIMIT $strt,300";
					//Execute the query
					$result2=mysqli_query($connect, $query2);
					$d=0;
						$inc=1;
						if(mysqli_num_rows($result2)>0){
						while($row2=mysqli_fetch_array($result2)){
						$m=$row2['message'];
						$d1=$row2['date'];
						$replyid=$row2['replyid'];
						$refid=$row2['conv_id'];
						
						$t=$row2['time'];
						$type=$row2['type'];
						$type2=$row2['typeext'];
						
						
						$f=$row2['username'];
						
						
						if($row2['username']==number){
						$c=$row2['contact'];
						$cc=$row2['username'];
						}else{
						$c=$row2['username'];
						$cc=$row2['contact'];
						}
						
						$query4="SELECT * FROM mango_user_credentials WHERE mobile_number='$c' LIMIT 1";

						//Execute the query
						$result4=mysqli_query($connect, $query4);
						
							if($row4=mysqli_fetch_array($result4)){
							$cf=$row4['first_name'];
							$cl=$row4['last_name'];
							}
							
					?>
  
  	  
								  <?php
								  if($d!==$d1){
								  ?>

							<li class="msg-day">
							    
									<small 
									style=" 
									border-radius:5px; 
									background:#222; margin-bottom:10px; 
								margin-top:20px; 
									color:#fff;
									font-family:candara,Roboto Slab">
									<?php echo $d1; ?>
								</small>
								<br>
							</li>
						<?php
						
									$d=$row2['date'];
									}
									?>
  
								  	<?php if($f!==number){ ?>
									
                                <li>
									<a>
                                    <div align="right" class="talkbubble4" id="thread<?php echo $inc; ?>">
									
									<?php
									if($type=='reply'){
									$query5="SELECT * FROM mango_conversations WHERE ref='$a' AND conv_id='$replyid' ORDER BY id ASC LIMIT 1";

									//Execute the query
									$result5=mysqli_query($connect, $query5);
										if(mysqli_num_rows($result5)>0){
										if($row5=mysqli_fetch_array($result5)){
									?>
									
										<div id="talkbubble4" style="width:100%; margin-bottom:5px">
													   <span 
													   style="margin-top:5px; 
													   color:#777; 
													   font-size:12px">
														   Replying to this message on <?php echo $row5['date']; ?> at <?php echo $row5['time']; ?>
														</span>
										<br>
									
										<?php echo $row5['message']; ?>
										</div>
									
									<?php 
									}
									}
									
									} ?>
					

										 <div
												<?php if($type2=='image'){?> style="min-height:200px"
												<?php } ?>>
												
												<?php if($type2=='image'){
												?>
										<div align="left" style="width:100%; padding:10px">
										<img id="conv_hover" onclick="showinfull('conv_hover')" src="uploads/<?php echo $type; ?>" alt="image" 
										controls
										type="image/png" style="
    height:100px;
    width:200px;
margin-right:10px; 
width:100px;
border-radius:1px"/>
										</div>
										<br />
										<?php
										}
										?>
										
										
										<?php if($type2=='video'){
										?>
										<video 
										controls 
										style="
										height:200px; 
										width:200px;border:2px #000 solid; 
										border-radius:1px">
										<source src="uploads/<?php echo $type; ?>" type="video/mp4"/></video>
										<br />
										<?php
										}
										?>
										<?php echo $m;?>
                                        </div>
                                      <small style="margin-top:5px">
<?php
try{
if(isset($d1) && !empty($d1) && $d1!==0){
$az = $d1;
$bz = $t;
$dealday = $az.' '.$bz;
$dealtime = strtotime($dealday);
$dealtime = date("y-m-d h:i:s a", $dealtime);
$dealtime = new datetime($dealtime);
$time = date("y-m-d h:i:s a");
$time = new datetime($time);

$remtime = $dealtime->diff($time);
$remtimea=$remtime->format( '%Y' );
$remtimeb=$remtime->format( '%M' );
$remtimec=$remtime->format( '%D' );
$remtimed=$remtime->format( '%H' );
$remtimee=$remtime->format( '%I' );
$remtimef=$remtime->format( '%S' );

if($remtimea>0){
    $remtime=intval($remtimea).'yrs';
}else{
   
 if($remtimeb>0){
     $remtime=intval($remtimeb).'ms';
}else{
    if($remtimec>0){
    $remtime=intval($remtimec).'d';
}else{
  if($remtimed>0){
     $remtime=intval($remtimed).'hrs';
}else{
    if($remtimee>0){
     $remtime=intval($remtimee).'mins';
}else{
    if($remtimef>0){
     $remtime=intval($remtimef).'sec';
}
}
}
}
}  
}

}else{
   $remtime='Long time';  
}
echo $remtime; 
}catch(Exception $e){
echo "...";
}
?></small>  
									  <small style="margin-top:5px; color:#fb0">
									  <?php
									if($type!=='reply'){
									?>
									  <span onClick="document.getElementById('reply<?php echo $a.$refid;?>').style.display=''" style="cursor:pointer">Reply</span>
									  <table id="reply<?php echo $a.$refid;?>" style="position:absolute; display:none; z-index:99999999; height:34px; width:240px; border-radius:10px; background:#fff; color:#000; margin-right:300px; box-shadow:0 0 2px 2px #999"><tr align="center" style="vertical-align:middle"><td style="width:80%">
									  <form id="replyform<?php echo $a.$refid;?>" method="post" action="reply.php">
									  <input type="hidden" name="replyref" value="<?php echo $a; ?>" />
									  <input type="hidden" name="replyid" value="<?php echo $refid; ?>" />
									  <input type="hidden" name="replycontact" value="<?php echo $c; ?>" />
									  <input type="text" name="replymsg" placeholder="reply here..." style=" outline:none; padding-left:5px; border:2px #555 solid; width:90%; border-radius: 15px; height:30px"></td><td style="width:10%">
                    <i onclick="document.getElementById('replyform<?php echo $a.$refid;?>').submit()" class="fa fa-send" style="height:30px; margin-top:19px; width:30px"></i>
					</form></td><td style="width:10%; font-size:17px; color:#f00" onClick="document.getElementById('reply<?php echo $a.$refid;?>').style.display='none'">&times;</td></tr></table>
					<?php
					}
					?>
									 <span onClick="document.getElementById('thread<?php echo $inc;?>').style.display=''" style="cursor:pointer">Save</span>
									 <span onClick="document.getElementById('thread<?php echo $inc;?>').style.transform='rotate(180deg)'" style="cursor:pointer">Rotate</span>
					</small>
					
					                </div>
									</a>
                                </li>
								
								
								  <?php }else{?>
								  
                                <li><a>
                                    <div align="left" class="talkbubble2" id="thread<?php echo $inc; ?>">
                                     
									<?php
									if($type=='reply'){
	$query5="SELECT * FROM mango_conversations WHERE ref='$a' AND conv_id='$replyid' ORDER BY id ASC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		 ?>
									<div id="talkbubble2" style="width:100%; margin-bottom:5px">
										<span style="margin-top:5px; color:#777; font-size:12px">
										Replying to this message on <?php echo $row5['date']; ?> at <?php echo $row5['time']; ?></span>
										<br>
										<?php echo $row5['message']; ?>
									</div>
									<?php 
									}
									}
									
									} ?>
									
									
                                        	<div
												<?php if($type2=='image'){?> style="min-height:200px"
												<?php } ?>>
												<?php if($type2=='image'){
												?>
										<div align="left" style="width:100%; padding:10px">
															<img id="conv_hover2" onclick="showinfull('conv_hover2')" src="uploads/<?php echo $type; ?>" alt="image" 
										controls
										type="image/png" style="
    height:100px;
    width:200px;
margin-right:10px; 
width:100px;
border-radius:1px"/></div>
										<br />
										<?php
										}
										?>
										
										<?php if($type2=='video'){
										?>
										<video controls style="height:200px; width:200px; border:2px #000 solid; border-radius:1px">
										<source src="uploads/<?php echo $type; ?>" type="video/mp4"/></video>
										<br />
										<?php
										}
										?>
										
										<?php echo $m;?>
                                        </div>
                                      <small style="margin-top:5px">
<?php
try{
if(isset($d1) && !empty($d1) && $d1!==0){
$az = $d1;
$bz = $t;
$dealday = $az.' '.$bz;
$dealtime = strtotime($dealday);
$dealtime = date("y-m-d h:i:s a", $dealtime);
$dealtime = new datetime($dealtime);
$timez = date("y-m-d h:i:s a");
$timez = new datetime($timez);

$remtime = $dealtime->diff($timez);
$remtimea=$remtime->format( '%Y' );
$remtimeb=$remtime->format( '%M' );
$remtimec=$remtime->format( '%D' );
$remtimed=$remtime->format( '%H' );
$remtimee=$remtime->format( '%I' );
$remtimef=$remtime->format( '%S' );

if($remtimea>0){
    $remtime=$d1;
}else{
   
 if($remtimeb>0){
     $remtime=$d1;
}else{
    if($remtimec>0){
    $remtime=$d1;
}else{
  if($remtimed>0){
     $remtime=intval($remtimed).'hrs';
}else{
    if($remtimee>0){
     $remtime=intval($remtimee).'mins';
}else{
    if($remtimef>0){
     $remtime=intval($remtimef).'sec';
}
}
}
}
}  
}

}else{
   $remtime='Long time';  
}
 echo $remtime; 
 }catch(Exception $e){
 echo 'Loading ...';
 }
 ?></small>   
									 <small style="margin-top:5px; color:#fb0">
									 			  <?php
									if($type!=='reply'){
									?>
						
									 <span onClick="document.getElementById('reply<?php echo $a.$refid;?>').style.display=''" style="cursor:pointer">Reply</span>
								 <table id="reply<?php echo $a.$refid;?>" style="position:absolute; display:none; z-index:99999999; height:34px; width:250px; border-radius:10px; background:#fff; color:#000; left:70px; margin-right:10px; box-shadow:0 0 2px 2px #999"><tr align="center" style="vertical-align:middle"><td style="width:80%">
									  <form id="replyform<?php echo $a.$refid;?>" method="post" action="reply.php">
									  <input type="hidden" name="replyref" value="<?php echo $a; ?>" />
									  <input type="hidden" name="replyid" value="<?php echo $refid; ?>" />
									  <input type="hidden" name="replycontact" value="<?php echo $c; ?>" />
									  <input type="text" name="replymsg" placeholder="reply here..." style=" outline:none; padding-left:5px; border:2px #555 solid; width:90%; border-radius: 15px; height:30px"></td><td style="width:10%">
                    <i onclick="document.getElementById('replyform<?php echo $a.$refid;?>').submit()" class="fa fa-send" style="height:30px; margin-top:19px; width:30px"></i>
					</form></td><td style="width:10%; font-size:17px; color:#f00" onClick="document.getElementById('reply<?php echo $a.$refid;?>').style.display='none'">&times;</td></tr></table>
					<?php
					}
					?>
									 <span onClick="document.getElementById('thread<?php echo $inc;?>').style.display=''" style="cursor:pointer">Save</span>
									 <span onClick="document.getElementById('thread<?php echo $inc;?>').style.transform='rotate(180deg)'" style="cursor:pointer">Rotate</span>
					</small>
					
                                    </div>
									</a>
                                </li>
								
								  <?php 
								  } 
								  ?>
							
								
								  <?php
								  
								  $inc=$inc+1;
    }
	
	}else{
    	echo "<li align='center'>No conversations yet.</li>";
    }

?>

<li id="currentconv"></li>				 
                            </ul>
                        </div>
                    </div>
							
								  <?php
    }
	
	}else{
    	echo "";
    }


}

}
?>


<style>
.imghover:hover{
height:400px;
width:400px;
}
</style>

