<br />
	<?php
				$c1='Masked';
				$c2='User';
				
	$query2="SELECT * FROM mango_chats WHERE username='".number."' OR contact='".number."' ORDER BY date DESC LIMIT 100";

    //Execute the query
    $result2=mysqli_query($connect, $query2);
	
		if(mysqli_num_rows($result2)>0){
		
		while($row2=mysqli_fetch_array($result2)){
		$c7=$row2['ref'];
		$c5=$row2['date'];
		$c6=$row2['time'];
		$c3=$row2['alerts'];
		
		if($row2['username']==number){
		$c4=$row2['contact'];
		}else{
		$c4=$row2['username'];
		}
		
		$query4="SELECT * FROM mango_user_credentials WHERE mobile_number='$c4' LIMIT 1";

    //Execute the query
    $result4=mysqli_query($connect, $query4);
	
		if($row4=mysqli_fetch_array($result4)){
		if($row4['first_name']!='' && $row4['last_name']!=' '){
		$c1=$row4['first_name'];
		}
		if($row4['last_name']!='' && $row4['last_name']!=' '){
		$c2=$row4['last_name'];
		}
		}
		
  ?>
  
				<div class="chatList mangochats" title="Tap to talk to <?php echo $c1; ?>" onClick="hideallconversations();document.getElementById('msg<?php echo $c7; ?>').style.display='';alert();document.getElementById('convref').value='<?php echo $c7; ?>';document.getElementById('convuser').value='<?php echo $c4; ?>';document.getElementById('conversation_name').innerHTML='<?php echo $c1.' '.$c2; ?>';document.getElementById('mango_day_bg_text').innerHTML='<?php echo $c1."\'s"; ?>';">
                                    <div class="img">
                                        <img src="<?php echo profimg($c4); ?>" alt="Youre talking to <?php echo $c1; ?>" class="avatar">
                                  </div>
                                <div class="desc">
                                        <small class="time"><p>
										<?php
										try{
if(isset($c5) && !empty($c5) && $c5!==0){
$az = $c5;
$bz = $c6;
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
    $remtime=$c5;
}else{
   
 if($remtimeb>0){
     $remtime=$c5;
}else{
    if($remtimec>0){
    $remtime=$c5;
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
 ?></p></small>
                                        <h5 style="font-size:13px"><?php $c10 = $c1.' '.$c2; 
		if(strlen($c10)<25){echo $c10;}else{echo substr($c10,0,20).'...';} ?>&nbsp;<b style="color:#f60; font-size:18px; margin-top:2px">&bull;</b></h5>
                                        <small><p>
									<?php
	$query5="SELECT * FROM mango_conversations WHERE ref='$c7' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if(strlen($row5['message'])<25){echo $row5['message'];}else{echo substr($row5['message'],0,20).'...';} 
		 }
		 }
		 ?>.</p></small>
                                        <small><p style="color:#f60; font-weight:600"><?php if($c3>0){ echo $c3; ?> New Notifications<?php } ?></p></small>
                                    </div>
                                </div>
  
                   <?php
    }
	
	}else{
		echo "<p align='center' style='color:#f20; font-weight:600'>Start some chats</p>";
    }

?>



<style>
.mangochats{
min-height:75px; transition:all .5s; color:#000; border-bottom:1px #ddd solid; background:#fff; margin-bottom:5px; padding:5px;
}
.mangochats:hover{
min-height:75px; transition:all .5s; color:#fff; border-bottom:1px #ddd solid; background:#000; margin-bottom:5px; padding:5px;
}
</style>


				 