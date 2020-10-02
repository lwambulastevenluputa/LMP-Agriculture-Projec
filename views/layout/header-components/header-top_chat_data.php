<?php

    //check connection to db that it is not the first time.
    session_start();
if(isset($_SESSION['mobilenumber'])){   
$_SESSION['user_name']=$_SESSION['mobilenumber'];
$accountuser=$_SESSION['mobilenumber'];
    define("chat_number", $_SESSION['user_name']);

    define("number", $_SESSION['user_name']);
}
    include('../../../config/db_connect.php');
    
				$c1='Masked';

				$c2='User';

	$query2="SELECT * FROM mango_chats WHERE username='".chat_number."' OR contact='".chat_number."' ORDER BY date DESC LIMIT 100";



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

  

				<table class="mangochats<?php echo $c7; ?>" title="Tap to talk to <?php echo $c1; ?>" onClick="document.getElementById('conversation_name').innerHTML='<?php echo $c1.' '.$c2; ?>';document.getElementById('drawer1').style.display='none';document.getElementById('drawer2').style.display='none';document.getElementById('drawer3').style.display='none';refreshingconv('<?php echo $c7; ?>');document.getElementById('convref').value='<?php echo $c7; ?>';document.getElementById('convuser').value='<?php echo $c4; ?>';document.getElementById('img_contact').value='<?php echo $c4; ?>';document.getElementById('img_chatref').value='<?php echo $c7; ?>';document.getElementById('vid_contact').value='<?php echo $c4; ?>';document.getElementById('vid_chatref').value='<?php echo $c7; ?>';document.getElementById('mangostore_conv').style.display='';" style="width:100%; min-height:75px; color:#000; border-bottom:1px #555 solid">
<tr style="vertical-align:middle">
    <td align="center" style="width:30%">
        
                                        <img src="<?php echo profimg($c4); ?>" title="Youre talking to <?php echo $c1; ?>" style="border:4px #555 solid; height:70px; width:70px; border-radius:0 20px 20px 20px">

    </td>

    <td style="width:70%" align="left">
                                        <small style="float:right; font-size:14px; margin-right:10px">

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

echo $remtime; }catch(Exception $e){

echo '...';

}

?></small>

                                        <span style="font-size:14px; font-weight:600"><?php $c10 = $c1.' '.$c2; 

		if(strlen($c10)<25){echo $c10;}else{echo substr($c10,0,20).'...';} ?>&nbsp;<b style="color:#f60; font-size:18px; margin-top:2px">&bull;</b></span>
<br>
                        
                        
                                        <div style="width:100%; overflow:hidden">

									<?php

	$query5="SELECT * FROM mango_conversations WHERE ref='$c7' ORDER BY id DESC LIMIT 1";

    //Execute the query

    $result5=mysqli_query($connect, $query5);

		if(mysqli_num_rows($result5)>0){

		if($row5=mysqli_fetch_array($result5)){

		//if(strlen($row5['message'])<25){echo $row5['message'];}else{echo substr($row5['message'],0,20).'...';} 
echo $row5['message'];
		 }

		 }

		 ?>...</div>
		 
<br>
                        
                                        <small><p>
                                            Tap to continue chatting
                                            </p>
                                            </small>
                                            
                                        <small><p style="color:#fff; font-weight:600"><?php if($c3>0){ echo $c3; ?> Threads<?php } ?></p></small>

                                    </td>
</tr>
</table>

  

                   <?php

    }

	

	}else{

		echo "<p align='center' style='color:#f20; margin-top:100px; font-size:24px; font-weight:600'>Start a chat.</p>";

    }


?>
