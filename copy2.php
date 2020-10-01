<?php 
session_start();
if(isset($_SESSION['mobilenumber'])){

//check connection to db that it is not the first time.

define("number",$_SESSION['mobilenumber']);
include('../config/db_connect.php');
?>


<?php
if(isset($_POST['replyref'])){
$ra=mysqli_escape_string($connect,$_POST['replyref']);
$ri=mysqli_escape_string($connect,$_POST['replyid']);
$rc=mysqli_escape_string($connect,$_POST['replycontact']);
$rm=mysqli_escape_string($connect,$_POST['replymsg']);

	$date=date('y-m-d');
	$time=date('h:i:s a');
 $query = "INSERT INTO mango_conversations(ref,username,contact,message,date,time,type,replyid) VALUES ('$ra','".number."','$rc','$rm','$date','$time','reply','$ri')";
 
    mysqli_query($connect, $query);
	
 $query1 = "UPDATE mango_chats SET alerts=alerts+1 WHERE ref='$ra'";

    //Execute the query
    mysqli_query($connect, $query1);
?>
<script>
startsound();
</script>
<?php
}


$msg="Tap to chat with contact.";
if(isset($_GET['c'])){
$a=mysqli_escape_string($connect,$_GET['c']);


    // insert the collected data into the database
	$date=date('ymd');
	$time=date('his');
	$ref=$date.$time;
	$date=date('y-m-d');
	$time=date('h:i:s a');
	
	
	$query4="SELECT * FROM mango_user_credentials WHERE ref='$a' LIMIT 1";
    //Execute the query
    $result4=mysqli_query($connect, $query4);
	
		if(mysqli_num_rows($result4)>0){
	
$row4=mysqli_fetch_array($result4);
$a=$row4['mobile_number'];

	$query2="SELECT * FROM mango_chats WHERE username='".number."' AND contact='".$a."' LIMIT 1";

    //Execute the query
    $result2=mysqli_query($connect, $query2);
	
		if(mysqli_num_rows($result2)==0){
    $query = "INSERT INTO mango_chats(ref,username,contact,date,time) VALUES ('$ref','".number."','$a','$date','$time')";

    //Execute the query
    mysqli_query($connect, $query);

    // notify user
    if (mysqli_affected_rows($connect) > 0) {
    	$msg="<p>Message sent successfully.</p>";
$startchat=$a;

    } else {
    	$msg="<p>Something has gone wrong with our application. Try later.</p>";
    }

}else{

$startchat=$a;

}

}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Mango Chat</title>
	
	<link rel="stylesheet" href="style2.css">
	<script src="/script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css">
	<script src="https://kit.fontawesome.com/5255961736.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Raleway:wght@500&display=swap" rel="stylesheet">
	<script src="jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>

<style>
	.main-section{
			margin-top: 60px;
			height: 100vh;
		}
		.head-section{
		border-bottom: 1px solid #bfbfbf;
		background-color: #F0F0F0;
		height: 85px;
		}
		#chat-btn, #contacts-btn, #mail-btn{
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
			padding: 7px 15px;
			outline: none;
			border-radius: 5px;
		}
		#chat-btn:hover, #contacts-btn:hover, #mail-btn:hover{
			background: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
		.chat-search{
			border: 1px solid #bfbfbf; 
			outline: none;
		}
		.start-chat-group button{
			width:110px; 
			height:30px; 
			border-radius:5px; 
			font-family: 'Roboto', serif;
			font-weight: 500;
			cursor: pointer;
			outline: none;
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
		}
		.start-chat-group button:hover{
			background: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
		
		.chatList .avatar {
			width: 50px;
			height: 50px;
		}						
		#settings-menu a{
			color: black;
			text-decoration: none;
		}
		.dropdown-content-attach button{
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
			width: 50px;
			height: 50px;
			border-radius: 25px;
			margin-top: 10px;
			cursor: pointer;
			outline: none;
		}
		.dropdown-content-attach button:hover{
			background: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
		.headRight-sub button{
			padding: 7px 15px;
			border-radius: 5px;
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
			outline: none;
			cursor: pointer;
		}
		.headRight-sub button:hover{
			background: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
		
		#personal-profile::-webkit-scrollbar {
    		width: 3px;
  		}
		#personal-profile::-webkit-scrollbar-track {
    		background: #f1f1f1; 
 		}
		#personal-profile::-webkit-scrollbar-thumb {
			background: #888; 
		}
		#personal-profile img{
			height:120px; 
			width:120px; 
		}
		#change-prof-pic-div{
			height:30px;
			width:70px; 
			border-radius:5px; 
			font-family: 'Roboto', serif;
			font-weight: 500;
			cursor: pointer;
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
			font-size:13px;
			padding: 7px 0;
			float: right;
		}
		#change-prof-pic-div:hover{
			background: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
		#change-prof-pic{
			font-family: 'Roboto',serif;
			cursor: pointer;
		}
		#save-photo{
			height:30px;
			width:70px; 
			border-radius:5px; 
			font-family: 'Roboto', serif;
			font-weight: 500;
			cursor: pointer;
			outline: none;
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
		}
		#save-photo:hover{
			background: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
		#visible{
			font-family: 'Roboto', serif;
			color:#000
		}
		#visibility-button{
			width:100px; 
			height:30px; 
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
			border-radius: 5px;
			cursor:pointer;
		}
		#visibility-button:hover{
			background: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
		#chat-back{
			font-family: 'Roboto', serif;
			color:#000
		}
		#profile-save-button{
			width:100px; 
			height:30px; 
			background:  #888889;
			color:#ffffff;
			border:1px solid #E6E6E6;
			border-radius: 5px;
			cursor:pointer;
			outline:none;
		}
		#profile-save-button:hover{
			background-color: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}
</style>

</head>
<body onLoad="startsound();">



    <script id="center">
	
		$(document).ready(function(){

            $(".navbar").click(function(){
            $(".dropdown-content-attach").hide(300);
            });
            $(".left").click(function(){
            $(".dropdown-content-attach").hide(300);
            });
            $(".center-section-middle").click(function(){
            $(".dropdown-content-attach").hide(300);
            });
            $(".center-section-bottom").click(function(){
            $(".dropdown-content-attach").hide(300);
            });

</script>

<script type="text/javascript">
function hideallconversations(){
document.getElementById('tapachat').style.display='none';
document.getElementById('chat-menu').style.display='inline-block';
}
       
	</script>
	
	
	

    <div class="main-section">
<?php
include('header.php');

$number=number;
?>


        <div 
		style="
		padding-top: 5px">
            <div 
			class="column left" 
			id="chats_drawer" 
			style="transition:all 1s" 
			onMouseOver="document.getElementById('mango_sync').style.display='none';
			document.getElementById('mango_cart').style.display='none';
			document.getElementById('mango_contact').style.display='none';
			document.getElementById('mango_wallet').style.display='none';
			document.getElementById('mango_mail').style.display='none';
			document.getElementById('mango_shortcuts').style.display='none';
			document.getElementById('mango_active').style.display='none'">

                <div class="head-section">
                    <div class="headLeft-section">
					<div class="headLeft-sub">
								<div class="mnu-btns">
									<button id="chat-btn">
										<i class="fas fa-comment-alt fa-lg"></i>
									</button>
									<button id="contacts-btn">
										<i class="fas fa-address-book fa-lg"></i>
									</button>
									<button id="mail-btn">
										<i class="fas fa-envelope fa-lg"></i>
									</button>
								</div>
							</div>

                        <div style="
						padding-left: calc(5% - 5px); 
						padding-bottom: calc(2% - 1px);">
                            <input 
							class="chat-search"
							type="text" 
							 name="search"
							 placeholder="Search your chats" >
                            </div>
                    </div>
                </div>
				
				
				
				<div class="start-chat-group"
				style="
				width:100%;
				padding-left:7%;
				padding-top: 5px;
				padding-bottom: 5px;">
						
							<button 
							type="submit"
							onClick="document.getElementById('mango_left_chats').style.display='none';
							document.getElementById('mango_left_contacts').style.display=''">
								Create Group 
							</button>
						&nbsp;&nbsp;
							<button 
							type="submit"
							onClick="document.getElementById('mango_left_chats').style.display='none';
							document.getElementById('mango_left_contacts').style.display=''">
								Start New Chat
							</button>
							&nbsp;&nbsp;
				</div>
                
				

                <div 
				class="body-section" 
				style="overflow-y: scroll; 
				overflow-x: hidden;">     
				
				
				
				
<script type="text/javascript">
var bb;			
function refreshingconv(e){
if(bb!=='undefined'){
clearInterval(bb);
}
$.ajax({
			type:'POST',
			url:'../webapp_resources/conversations.php',
			dataType:'html',
			data:{user:e},
			cache:false,
			success: function(response){
			document.getElementById('conversations').innerHTML=response;
			bb = setInterval(function(){refreshingconv(e);},10000);

			}
			});
}



function refreshingconv2(e){
$.ajax({
			type:'POST',
			url:'../webapp_resources/conversations.php',
			dataType:'html',
			data:{user:e},
			cache:false,
			success: function(response){
			document.getElementById('conversations').innerHTML=response;
			}
			});
}
</script>
				
				
				
				
				<div id="mango_left_chats">
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
  
				<div class="chatList mangochats" title="Tap to talk to <?php echo $c1; ?>" onClick="refreshingconv('<?php echo $c7; ?>');document.getElementById('convref').value='<?php echo $c7; ?>';document.getElementById('convuser').value='<?php echo $c4; ?>';document.getElementById('img_contact').value='<?php echo $c4; ?>';document.getElementById('img_chatref').value='<?php echo $c7; ?>';document.getElementById('vid_contact').value='<?php echo $c4; ?>';document.getElementById('vid_chatref').value='<?php echo $c7; ?>';document.getElementById('conversation_name').innerHTML='<?php echo $c1.' '.$c2; ?>';">
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
echo $remtime; }catch(Exception $e){
echo '...';
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

				</div>

				<div 
				id="mango_left_contacts" 
				style="display:none;
				text-align:center;">
				
					<input 
					id="add_contact_input"
					type="submit" 
					onClick="document.getElementById('newcontact').style.display=''" 
					title="Create New Contact"
					value="Add New Contact"/>
<style>
#mango_left_contacts #add_contact_input{
	width:150px; 
	height:30px; 
	background:  #888889;
	color:#ffffff;
	border:1px solid #E6E6E6;
	border-radius: 5px;
	cursor:pointer;
	outline:none;
	font-family: 'Roboto', serif;
	font-weight:500;
}
#mango_left_contacts #add_contact_input:hover{
			background-color: #fdbd4e;
			color: #ffffff;
			box-shadow: 2px 2px 5px grey;
			border: none;
		}	
</style>				
				
				<div 
				align="right" 
				style="width:100%; 
				background:#fff; 
				padding-top:4px; 
				height:35px">
					<span 
					style="color:#000; 
					font-size:12px; 
					float:left; 
					margin-top:10px; 
					margin-left:10px">
					<?php echo $msg; ?>
					</span>
				</div>
				
				
				<div 
				id="newcontact" 
				align="center" 
				style="
				display:none; 
				overflow-y:auto; 
				position:fixed; 
				top:30%; 
				left:25%; 
				width:30%; 
				height:30%; 
				background:#fafafa;
				z-index:999999; 
				box-shadow: 5px 5px 5px grey; 
				border-radius:10px">
				
					<div 
					align="right" 
					onClick="document.getElementById('newcontact').style.display='none'" 
					style="
					width:100%; 
					font-size:30px; 
					height:10%; 
					color:#000; 
					padding-top:5px;
					cursor:pointer;">
					&times; &nbsp;&nbsp;
				</div>
				
				<div align="center" 
				style="
				width:80%; 
				font-size:15px; 
				padding:8% 0;
				font-family:'Roboto', serif;">
					<b>Add a new mango contact</b>
				<br>
				<br>
					<form method="post" 
					action="contacts.php">
						<input 
						type="tel" 
						name="addcontact_number" 
						id="addcontact_number" 
						placeholder="Phone Number" 
						required 
						style=" 
						text-align:center; 
						width:50%; 
						height:30px; 
						border:1px solid #E6E6E6; 
						border-radius:5px;
						outline:none;"/>
				<br>
				<br>
						<input 
						type="submit" 
						id="addcontact_button"
						value="Save Contact"/>
				</form>
				</div>
				</div>
<style>
	#addcontact_button{
		width:100px; 
		height:30px; 
		background:  #888889;
		color:#ffffff;
		border:1px solid #E6E6E6;
		border-radius: 5px;
		cursor:pointer;
		outline:none;
	}
	#addcontact_button:hover{
		background-color: #fdbd4e;
		color: #ffffff;
		box-shadow: 2px 2px 5px grey;
		border: none;
	}
</style>
				
				<div 
				id="your_contas"
				style="
				height:600px; 
				overflow-y:auto; 
				overflow-x:hidden; 
				width:100%; 
				color:#000; 
				font-size:14px; 
				background:#fff">

					<div style="padding:20px">

					<?php include('../webapp_resources/allcontacts.php'); ?>

				</div>

		</div>
				
	</div>

<style>
.mangochats{
			min-height:75px; 
			transition:all .3s; 
			color:#000; 
			border-bottom:1px #ddd solid;
			margin-bottom:5px; 
			padding:5px;
			cursor: pointer;
		}
		.mangochats:hover{
			min-height:75px; 
			transition:all .3s; 
			color:#000;
			border-bottom:1px #ddd solid; 
			background-color: #F0F0F0;
			margin-bottom:5px; 
			padding:5px;
		}
</style>


				 
						<div style="
						position:absolute;
						left:15px;
						bottom:50px;">
						<i class="fas fa-cog fa-2x"
						id="acc-settings"></i>

						<div style="
						margin-top:10px;
						padding-left: 0px;
						padding-top: 10px;
						width:200px; 
						height:160px; 
						background:#fafafa; 
						color:#000; 
						overflow-y:auto; 
						z-index:100; 
						box-shadow:5px 5px 10px grey; 
						border-radius:5px; 
						font-family: 'Noto, Sans', sans-serif;
						font-weight: 100;
						border: 1px solid #bfbfbf;
						display:none;
									"
						id="settings-menu">
									
										<div 
										class="mangosettings"
										id="mangosettings-profile">
										&nbsp;Profile
										</div>
									
										<div class="mangosettings">
										&nbsp;Archives
										</div>
										<div class="mangosettings">
										&nbsp;Stared Messages
										</div>
										<div class="mangosettings">
										&nbsp;Settings
										</div>
									<a href="../index.php?logout">
										<div class="mangosettings">
										&nbsp;Log-Out
										</div>
									</a>
						</div>

						<script id="mango-settings-script">
										$(document).ready(function(){

											$("#acc-settings").click(function(){
											$("#settings-menu").toggle(300);
											});
										
										});
									</script>

						</div>
<style>
	#acc-settings{
		color: rgba(105, 105, 105, 0.3);
		cursor: pointer;
	}
	#acc-settings:hover{
		color: rgba(255, 153, 0, 0.7);
	}
	.mangosettings{
		width:100%;
		padding-left: 10px;
		cursor: pointer;
		padding-top: 5px;
		padding-bottom: 5px;
		font-weight: 100;
	}
	.mangosettings:hover{
		background-color: #F0F0F0;
	}
</style>

			</div>
        
				</div>

		
		
            <div 
			class="column center" 
			id="conv_drawer" 
			style="transition:all 1s" 
			onMouseOver="document.getElementById('mango_sync').style.display='none';
			document.getElementById('mango_cart').style.display='none';
			document.getElementById('mango_contact').style.display='none';
			document.getElementById('mango_wallet').style.display='none';
			document.getElementById('mango_mail').style.display='none';
			document.getElementById('mango_shortcuts').style.display='none';
			document.getElementById('mango_active').style.display='none'">

                <div class="head-section">

                    <div
					class="headCenter-section" 
					style="
					display: flex; 
					justify-content: space-between;">

                            <div 
							style="
							display:inline; 
							text-transform:capitalize; 
							color:#000; 
							font-size:25px; 
							padding:10px; 
							font-family: 'Roboto', serif;  
							font-weight:500"  
							align="left">
							
								<span id="conversation_name"
								style="
								cursor:pointer;">
								<img src="<?php echo profimg($c4); ?>" 
									alt="Youre talking to <?php echo $c1; ?>" 
									class="avatar">
									<?php 
										$c10 = $c1.' '.$c2; 
										if(strlen($c10)<25){echo $c10;}else{echo substr($c10,0,20).'...';} 
									?>
								</span>
							</div>
                        
							<div id="chat-menu" 
							style="
							display:inline-block; 
							width:auto;
							height:50px;">
                            
								<div style="
								display: flex; 
								right:0; 
								padding-top: 30px" 
								align="right">
                                
									<div class="dropdown-search"
									style="
									padding-right:10px;">
										<i class="far fa-search fa-lg" 
										style=" cursor: pointer;" 
										id="menu-search"></i>
									</div>
									<input class="searchname" align="left" 
									autocorrect="off" 
									autocomplete="off" 
									style="outline:none; 
									width: 200px;
									border:1px solid #bfbfbf;
									border-radius: 15px; 
									background: #fff; 
									font-size:13px;
									display: none;" 
									name="searchname" 
									type="text" 
									id="myInput" 
									onKeyUp="myFunction()" placeholder="Search in conversation..." 
									title="Filter">&nbsp;
									<i class="fas fa-arrow-right fa-lg"
									style="color: #898989;
									cursor:pointer;
									display:none;"
									id="menu-search-arrow"></i>

								<script id="menu-items-script">
									$(document).ready(function(){

										$("#menu-search").click(function(){
										$("#myInput").toggle(300);
										$("#menu-search-arrow").show();
										$("#menu-search").hide();
										$(".attach").hide();
										$(".chat-options").hide();
										});
										$("#menu-search-arrow").click(function(){
										$("#myInput").toggle(300);
										$("#menu-search-arrow").hide();
										$("#menu-search").show();
										$(".attach").show();
										$(".chat-options").show();
										$(".chat-options").show();
										});
									});
								</script>

								
								<div 
								class="attach" 
								style="float:right;
								padding-right: 10px;">
                                	<i class="fal fa-paperclip fa-lg" 
									style="cursor: pointer;" 
									id="menu-attach"></i>
                                		<div class="dropdown-content-attach" 
										id="dropdown-content-attach">
                                    		<button onClick="document.getElementById('mango_send_image').style.display='';" 
											id="image-attach">
                                        		<i class="far fa-image fa-2x"></i>
                                    		</button>
                                    <br>
                                    		<button onClick="document.getElementById('mango_send_video').style.display='';" 
											id="camera-attach" >
                                        		<i class="fas fa-camera-retro fa-2x"></i>
                                    		</button>
                                    <br>
                         
                                    		<button onClick="document.getElementById('mango_webcam').style.display='';" 
											id="camera-attach" >               
											<i class="fas fa-video fa-2x"></i>
                                    		</button>
                                    <br>
                                    </div>
                                </div>
                               
								<script id="menu-attach-script">
	
									$(document).ready(function(){

										$("#menu-attach").click(function(){
										$(".dropdown-content-attach").toggle(300);
										$("#mango_send_image").hide(300);
										$("#mango_send_video").hide(300);
										});
									
									});
								</script>
								
                                <div class="chat-options" style="margin-left:5px; margin-right:20px">
                                <i  class="fas fa-ellipsis-v fa-lg" style="cursor: pointer;" id="menu-options"></i>
                                </div>
							
				
				
				<div id="mango_options"
									style="display:none; 
									margin-top: 55px;
									overflow-y:auto; 
									position:absolute;
									left: 45%;
									padding-left: 0px;
									padding-top: 10px;	
									width:200px; 
									height:140px;
									display:inline-block;
									background:#fafafa; 
									color:#000; 
									overflow-y:auto; 
									z-index:100; 
									box-shadow:5px 5px 10px grey; 
									border-radius:5px; 
									font-family: 'Noto, Sans', sans-serif;
									font-weight: 100;
									border: 1px solid #bfbfbf
									">
										<div class="mangooptions">
										Select Messages&nbsp;
										</div>
										<div class="mangooptions">
										&nbsp;Mute Notifications
										</div>
										<div class="mangooptions">
										&nbsp;Clear Chat
										</div>
										<div class="mangooptions">
										&nbsp;Delete Chat
										</div>
									
									</div>
								
								
															<script id="menu-items-script">
										$(document).ready(function(){

											$("#menu-options").click(function(){
											$("#mango_options").toggle(300);
											});
										
										});
									</script>
								
								
<style>
.mangooptions{
	padding-top:5px; 
	padding-bottom:5px;
	padding-left: 10px;
	color:#000; 
	width:100%; 
	font-size: 17px; 
	cursor: pointer;
}
.mangooptions:hover{
	background-color: #F0F0F0;
}
</style>
								





								
								
								
								
                            </div>
                        </div>

                   </div>

                </div>

            <div class="body-section">
                    
				<div align="right" style="width:100%; border-bottom:1px #ddd solid; padding-top:5px; height:35px">

	

<input class="searchname" align="left" autocorrect="off" autocomplete="off" style="outline:none; border:none; background:none; color:#000; font-size:12px; float:left" name="searchname" type="text" id="myInput" onKeyUp="myFunction()" placeholder="Type to filter conversation" title="Filter">


				<span style="color:#000; text-transform:capitalize; font-size:12px; float:right; margin-top:5px; margin-right:10px"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>" id="refresh" style="color:#000">Refresh.</a></b></span>
				
				</div>

				<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['bg']!=='' && $row5['bg']!==' '){
		$bg='uploads/'.$row5['bg'];
		 }else{
		$bg='img/backimage.png'; 
		 }
		 }else{
		$bg='img/backimage.png'; 
		 }
		 }else{
		$bg='img/backimage.png'; 
		 }
		 ?>
                <div id="conversations" class="center-section-middle" style="overflow-y: scroll; background-image:url(<?php echo $bg; ?>); background-repeat:no-repeat; background-position:center; background-size:100% 100%; width:100%; height:80%; display:inline-block; overflow-x: hidden;">


<div id="tapachat" align="center" style="font-size:16px; margin-top:100px; color:#f60; height:40px; width:100%">
Tap a chat to view conversations
</div>

                </div>


<script>
function startday(){
document.getElementById('mango_day_bg').style.display='';
setTimeout(function(){
document.getElementById('mango_day_bg').style.display='none';
},5000);
}
</script>


				<div id="mango_day_bg" align="center" style=" display:none; overflow-y:auto; position:fixed; top:0%; left:0%; width:100%; height:100%; background:#63a; z-index:999999999; color:#000; overflow:hidden">
				<div style="padding:150px">
				<b style="font-size:24px; color:#000">Send To A Mango And</b>
				<br>
				<b style="font-size:80px; color:#000">Make That <span id="mango_day_bg_text" style="text-transform:capitalize">Someone's</span> Day</b>
				</div>
</div>





<script>
function closemangoes(){
document.getElementById('mango_video').style.display='none';
document.getElementById('mango_image').style.display='none';
document.getElementById('mango_1').style.display='none';
document.getElementById('mango_2').style.display='none';

document.getElementById('mango_bg').style.display='none';

}
</script>


				<div id="mango_bg" onClick="closemangoes()" align="center" style=" display:none; overflow-y:auto; position:fixed; top:0%; left:0%; width:100%; height:100%; background:rgba(255,255,255,0.3); z-index:99999; color:#000; overflow:hidden">
</div>


				<div id="mango_video" align="center" style=" display:none; overflow-y:auto; position:fixed; top:12%; left:19%; width:600px; height:600px; background:#f40; color:#000; z-index:999999999; overflow-y:auto; box-shadow:0 0 5px 5px #555; border-radius:50% 50% 50% 30%; padding-top:75px">
				
				<div align="center" style=" width:400px; height:400px; background:#000; color:#fff; overflow-y:auto; border-radius:50%">
				
				</div>
				
				</div>
				
				
			
			
			
				<div id="mango_image" align="center" style=" display:none; overflow-y:auto; position:fixed; top:12%; left:19%; width:600px; height:600px; background:#f40; color:#000; z-index:999999999; overflow-y:auto; box-shadow:0 0 5px 5px #555; border-radius:50% 50% 50% 30%; padding-top:75px">
				
				<div align="center" style=" width:400px; height:400px; background:#000; color:#fff; overflow-y:auto; border-radius:50%">
				
				</div>
				
				</div>
				
				
				
				
				
				<div id="mango_1" align="center" style=" display:none; overflow-y:auto; position:fixed; top:20%; left:27%; width:400px; height:400px; background:#f40; color:#000; z-index:999999999; overflow-y:auto; box-shadow:0 0 5px 5px #555; border-radius:50% 50% 50% 30%; padding-top:45px">
				
				</div>
				
				<div id="mango_2" align="center" style=" display:none; overflow-y:auto; position:fixed; top:10%; left:35%; width:400px; height:400px; background:#f40; color:#000; z-index:999999999; overflow-y:auto; box-shadow:0 0 5px 5px #555; border-radius:50% 50% 50% 30%; padding-top:45px">
				
				</div>
				
				
				



				<div id="mango_fruit" align="center" style=" display:none; overflow-y:auto; position:fixed; top:30%; left:10%; width:30%; height:40%; background:#fff; color:#000; overflow-y:auto; box-shadow:0 0 5px 5px #555; border-radius:10px; padding:10px">
				
				<div align="right" onClick="document.getElementById('mango_fruit').style.display='none'" style="width:100%; font-size:24px; height:40px; border-bottom:1px #ddd solid; color:#000; padding-top:5px">
				&times; &nbsp;&nbsp;
				</div>
				
				<div align="left" class="mangocodes" onClick="document.getElementById('mango_bg').style.display='';document.getElementById('mango_video').style.display=''">
				Make your day Video
				<table style="float:right; margin-top:-5px; height:30px; width:150px">
				<tr style="vertical-align:middle" align="center">
				<td style="width:40%" align="left">
				<b style="font-size:12px; color:#070">Choose</b>
				</td>
				<td style="width:60%">
				<input type="button" style="width:98%; height:20px; font-size:10px; border-radius:3px; color:#fff; background:#f60; border:1px #f60 solid" value="Send Mango">
				</td>
				</tr>
				</table>
				</div>
				
				<div align="left" class="mangocodes" onClick="document.getElementById('mango_bg').style.display='';document.getElementById('mango_image').style.display=''">
				Make your day Image
				<table style="float:right; margin-top:-5px; height:30px; width:150px">
				<tr style="vertical-align:middle" align="center">
				<td style="width:40%" align="left">
				<b style="font-size:12px; color:#070">Choose</b>
				</td>
				<td style="width:60%">
				<input type="button" style="width:98%; height:20px; font-size:10px; border-radius:3px; color:#fff; background:#f60; border:1px #f60 solid" value="Send Mango">
				</td>
				</tr>
				</table>
				</div>
				
				<a href="gravity.php">
				<div align="left" class="mangocodes">
				Pilot Game
				<table style="float:right; margin-top:-5px; height:30px; width:150px">
				<tr style="vertical-align:middle" align="center">
				<td style="width:40%" align="left">
				</td>
				<td style="width:60%">
				<b style="font-size:12px">Play</b>
				</td>
				</tr>
				</table>
				</div>
				</a>
				
				<br>
				<br>
				<!--
				<div align="left" style="padding:10px; color:#f60; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				Mangotongues
				<table style="float:right; margin-top:-5px; height:30px; width:150px">
				<tr style="vertical-align:middle" align="center">
				<td style="width:40%" align="left">
				<b style="font-size:12px; color:#070">Off</b>
				</td>
				<td style="width:60%">
				<input type="button" style="width:98%; height:20px; font-size:10px; border-radius:3px; color:#fff; background:#f60; border:1px #f60 solid" value="Turn On">
				</td>
				</tr>
				</table>
				</div>
				
				<div onClick="document.getElementById('mango_bg').style.display='';document.getElementById('mango_1').style.display=''" align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Mango
				<span style="float:right">You 1st Person</span>
				</div>
				
				<div align="left" onClick="document.getElementById('mango_bg').style.display='';document.getElementById('mango_1').style.display='';document.getElementById('mango_2').style.display=''" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				2 Mangoes
				<span style="float:right">Other 2nd Person</span>
				</div>
				
				
				<div align="left" onClick="document.getElementById('mango_bg').style.display='';document.getElementById('mango_1').style.display='';document.getElementById('mango_2').style.display=''" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				3 Mangoes
				<span style="float:right">Another 3rd Person</span>
				</div>
				
				
				<div align="left" onClick="document.getElementById('mango_bg').style.display='';document.getElementById('mango_1').style.display='';document.getElementById('mango_2').style.display=''" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Mango Shell
				<span style="float:right">Emotion Or Feelings</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				2 Mangoes + 1 Apple
				<span style="float:right">Intimate Greeting</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				2 Mangoes + 1 Strawberry
				<span style="float:right">2 People Kissng</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Sliced Mango
				<span style="float:right">No Or Denial</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				2 Sliced Mangoes
				<span style="float:right">Never</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Eaten Mango
				<span style="float:right">Yes Or Agreement</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Apple
				<span style="float:right">Love</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Strawberry
				<span style="float:right">Kiss</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Sliced Apple
				<span style="float:right">Like</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Rotten Apple
				<span style="float:right">Hate</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Grape Bunch
				<span style="float:right">Think</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				2 Grape Bunches
				<span style="float:right">Miss</span>
				</div>
				
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Ginger
				<span style="float:right">Detest Or Cant Stand</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Banana
				<span style="float:right">Mans Sexuality</span>
				</div>
				
				<div align="left" style="padding:10px; color:#000; font-size:14px; width:90%; border-bottom:1px #ddd solid">
				1 Cherry
				<span style="float:right">Womans Sexuality</span>
				</div>
				
				
				-->
				
				
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				

				<div id="mango_webcam" 
				align="center" 
				style="display:none; 
				overflow-y:auto; 
				position:fixed; 
				bottom:10%; 
				left:15%; 
				width:70%; 
				height:80%; 
				z-index:99999999; 
				background:#fafafa; 
				color:#fff; 
				overflow-y:auto; 
				box-shadow:5px 5px 10px grey; 
				border-radius:10px;">
		
					<div align="left" 
					onClick="document.getElementById('mango_webcam').style.display='none'" 
					style="width:100%; 
					font-size:35px; 
					height:40px; 
					border-radius:10px 10px 0 0;
					border-bottom:1px #ddd solid; 
					color:#000; 
					background:#fdbd4e;
					padding-top:3px">
					&nbsp;&nbsp;&minus; 
					</div>
								
				
<style>
#container {
	width: 98%;
	height:80%;
}
#videoElement {
	width: 100%;
	height: 100%;
	background-color: #666;
}
</style>

					<div id="container">
						<video autoplay="true" 
						id="videoElement">
						</video>
						<img src="">
						<canvas style="display:none;">
						</canvas>
					</div>



					<div align="center" 
					style="width:100%; 
					padding-top:10px;
					height:auto;">
						<table style="width:80%;">
							<tr style="vertical-align:middle">
								<td style="width:25%"
								align="center">
									<button onClick="startcam()"
									id="start-cam-button">
										<i class="fas fa-play fa-lg"></i>
									</button>
								</td>
								<td style="width:25%"
								align="center">
									<button onClick="stop()"
									id="stop-cam-button">
									<i class="fas fa-stop fa-lg"></i>
									</button>
								</td>
								<td style="width:25%"
								align="center">
									<button id="screenshotButton">
										<i class="fas fa-camera fa-lg"></i>
									</button>
								</td>
								<td style="width: 25%;"
								align="center">
									<a href="" id="dlink" download>
									<button id="pic-download-button">
										<i class="fas fa-download fa-lg"></i>
									</button>
									</a>
								</td>
							</tr>
					</table>
					
					</div>

<style>
	#screenshotButton, 
	#start-cam-button, 
	#stop-cam-button,
	#pic-download-button{
		padding: 7px 15px;
		border-radius: 5px;
		background:  #888889;
		color:#ffffff;
		border:1px solid #E6E6E6;
		outline: none;
		cursor: pointer;
	}
	#screenshotButton:hover, 
	#start-cam-button:hover, 
	#stop-cam-button:hover,
	#pic-download-button:hover{
		background: #fdbd4e;
		color: #ffffff;
		box-shadow: 2px 2px 5px grey;
		border: none;
	}
</style>

<script>
var video = document.querySelector("#videoElement");
var img = document.querySelector("img");
var canvas = document.querySelector("canvas");
var screenshotButton = document.getElementById("screenshotButton");
var dlink = document.getElementById("dlink");

screenshotButton.onclick = video.onclick = function() {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  // Other browsers will fall back to image/png
  dataURL = canvas.toDataURL('image/png');
  img.src = dataURL;
  dlink.href = dataURL;
  dlink.style.display='';
};


function startcam(){
if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (error) {
      console.log("Something went wrong!");
    });
}
}

function stop(e) {
  var stream = video.srcObject;
  var tracks = stream.getTracks();

  for (var i = 0; i < tracks.length; i++) {
    var track = tracks[i];
    track.stop();
  }

  video.srcObject = null;
}

</script>
				
	</div>
				
				
				
				
				
				
				




				
				<div 
				id="mango_send_image" 
				align="center" 
				style="display:none; 
				overflow-x:hidden;
				overflow-y:auto; 
				position:fixed; top:25%; 
				left:20%; 
				width:32%; 
				height:32%; 
				background:#fafafa;
				color:#fff; 
				overflow-y:auto; 
				box-shadow:5px 5px 10px grey; 
				border-radius:10px; 
				padding:10px">
		
						<div align="left"
						onClick="document.getElementById('mango_send_image').style.display='none'" 
						style="
						width:100%; 
						font-size:35px; 
						height:40px; 
						color:#000; 
						cursor:pointer;
						margin-left:6%;">
						&minus; &nbsp;&nbsp;
						</div>
				
						<div align="left" 
						style="color:#fff; 
						font-weight:500; 
						padding:10px; 
						font-size:14px; 
						width:90%; 
						border-bottom:1px #ddd solid; 
						background:#fdbd4e;
						border-radius:5px 5px 0 0;
						font-family:'Roboto',serif;">
				Upload Image
				</div>
				
				<style>
				.hidden{
				display:none;
				}
				</style>
				
				<form method="post" 
				action="fastupload.php" 
				enctype="multipart/form-data">
					<input type="hidden" 
					name="chatref" 
					id="img_chatref"/>
					<input type="hidden" 
					name="contact" 
					id="img_contact"/>
					<input type="file" 
					name="fileToUpload" 
					id="fileToUpload" 
					class="hidden">
				
				
					<div align="left" 
					class="mangocodes">
						Tap to add Photo
					<table 
					style="float:right; 
					margin-top:-10px; 
					height:30px; 
					width:30%">
						<tr 
						style="vertical-align:middle" 
						align="center">
							<td 
							style="width:40%" 
							align="left">
								<label 
								for="fileToUpload">
									<b style="
									font-size:13px;
									cursor:pointer; 
									color:#000;
									font-family:'Roboto',serif;">
										Choose
									</b>
								</label>
							</td>
							<td 
							style="
							width:60%">
								<input 
								type="submit" 
								id="send-image-input"
								value="Send Image">
				</td>
				</tr>
				</table>
				</div>

<style>
	#send-image-input{
		width:98%; 
		height:30px; 
		font-size:13px; 
		border-radius:5px; 
		color:#fff; 
		background:  #888889;
		color:#ffffff;
		border:1px solid #E6E6E6;
		cursor:pointer;
	}
	#send-image-input:hover{
		background: #fdbd4e;
		color: #ffffff;
		box-shadow: 2px 2px 5px grey;
		border: none;
	}
</style>
				
				<br>
					<div align="center">
						<input
						name="piccaption" 
						type="text" 
						style="
						border:1px solid #E6E6E6; 
						border-radius:10px; 
						outline:none; 
						background:#fff; 
						color:#000; 
						font-size:14px; 
						text-align:center; 
						height:30px; 
						width:100%" 
						maxlength="1000" 
						placeholder="caption...">
					/>
				</div>
				
				
				</form>
				
				</div>


				
				
				
				
				
				
				
				
				
				
				
				
				
				<div id="mango_send_video" 
				align="center" 
				style="display:none; 
				overflow-x:hidden;
				overflow-y:auto; 
				position:fixed; top:25%; 
				left:20%; 
				width:32%; 
				height:35%; 
				background:#fafafa;
				color:#fff; 
				overflow-y:auto; 
				box-shadow:5px 5px 10px grey; 
				border-radius:10px; 
				padding:10px">
		
					<div align="left" 
					onClick="document.getElementById('mango_send_video').style.display='none'" 
					style="width:100%; 
						font-size:35px; 
						height:40px; 
						color:#000; 
						cursor:pointer;
						margin-left:6%;">
						&minus; &nbsp;&nbsp;
					</div>
				
					<div align="left" 
					style="color:#fff; 
						font-weight:500; 
						padding:10px; 
						font-size:14px; 
						width:90%; 
						border-bottom:1px #ddd solid; 
						background:#fdbd4e;
						border-radius:5px 5px 0 0;
						font-family:'Roboto',serif;">
							Upload Video
					</div>
				
				<style>
				.hidden{
				display:none;
				}
				</style>
				
					<form 
					method="post" 
					action="fastupload1.php" 
					enctype="multipart/form-data">
						<input 
						type="hidden" 
						name="chatref1" 
						id="vid_chatref"/>
						<input 
						type="hidden" 
						name="contact1" 
						id="vid_contact"/>
						<input 
						type="file" 
						name="fileToUpload1" 
						id="fileToUpload1" 
						class="hidden">
									
				
					<div align="left" 
					class="mangocodes">
						Tap to add Video
						<table 
					style="float:right; 
					margin-top:-10px; 
					height:30px; 
					width:30%">
						<tr 
						style="vertical-align:middle" 
						align="center">
							<td 
							style="width:40%" 
							align="left">
								<label 
								for="fileToUpload1">
									<b style="
									font-size:13px;
									cursor:pointer; 
									color:#000;
									font-family:'Roboto',serif;">
										Choose
									</b>
								</label>
							</td>
							<td 
							style="
							width:60%">
								<input 
								type="submit" 
								id="send-image-input"
								value="Send Video">
							</td>
						</tr>
				</table>
			</div>
				
				
				<br>
				<br>
				
				
				<div align="center">
						<input
						name="piccaption" 
						type="text" 
						style="
						border:1px solid #E6E6E6; 
						border-radius:10px; 
						outline:none; 
						background:#fff; 
						color:#000; 
						font-size:14px; 
						text-align:center; 
						height:30px; 
						width:100%" 
						maxlength="1000" 
						placeholder="caption...">
					/>
				</div>
				
				
				
				</form>
				
				</div>


				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<div id="mango_code" 
				align="center" 
				style="display:none; 
				overflow-y:auto; 
				position:fixed; 
				top:30%; 
				left:10%; 
				width:40%; 
				height:40%; 
				background:#fff; 
				color:#000; 
				overflow-y:auto; 
				box-shadow:0 0 5px 5px #555; 
				border-radius:10px; 
				padding:10px">
		
				<div align="right" onClick="document.getElementById('mango_code').style.display='none'" style="width:100%; font-size:24px; height:40px; border-bottom:1px #ddd solid; color:#000; padding-top:5px">
				&times; &nbsp;&nbsp;
				</div>
				
				<br>
				<br>
				<span id="mango_loc"></span>
				<br>
				<br>
				<input type="button" style="width:100px; height:30px; font-size:13px; border-radius:3px; color:#fff; background:#000; border:1px #000 solid" value="Send Location">
				<script type="text/javascript">
var x = document.getElementById("mango_loc");
x.innerHTML="Location will show up here.";
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
getLocation();
</script>
				
				</div>
				
				



<style>
.mangocodes{
	padding:10px; 
	color:#000; 
	font-size:14px; 
	width:90%; 
	border-bottom:1px #ddd solid; 
	background:#fff;
	font-family:'Roboto',serif;
	font-weight: 500;
}

</style>
























<script type="text/javascript">
function enteremoji(a){
var b = document.getElementById('convusermsg_div');
if(a=='long_laugh'){
b.innerHTML=b.innerHTML+"<img src='emoticons/long_laugh.png' style='width:14px; height:14px'/>";
}

document.getElementById('convusermsg').value=document.getElementById('convusermsg_div').innerHTML;

}
</script>


				

                <div class="center-section-bottom" style="display:inline-block; border-top:none; background:#fff; height:200px; width:100%" align="center">
					 <table style="width:100%; height:50px">
					 <tr style="vertical-align:middle" align="center">
					 <td style="width:5%">
					 <span onClick="document.getElementById('mango_smileys').style.display=''"><img src="emoticons/long_laugh.png" style="height:40px; width:40px"></span>
					 
					 
					 
				<div id="mango_smileys" 
				align="center" 
				style="display:none; 
				overflow-y:auto; 
				position:absolute; 
				bottom:5%; 
				width:200px; 
				height:10%px; 
				background:#fff; 
				transition:all .3s; 
				color:#000; 
				overflow-y:auto; 
				box-shadow:5px 5px 10px grey; 
				border-radius:15px; 
				padding:10px">
		
				<div align="right" 
				onClick="document.getElementById('mango_smileys').style.display='none'" 
				style="width:100%; 
				font-size:35px; 
				height:40px; 
				cursor:pointer; 
				color:#000; ">
				&times; &nbsp;&nbsp;
				</div>
				
				
				
				
				
				<table style="width:100%">
				<tr style="height:30px; vertical-align:middle" align="center">
				<td style="width:20%" onClick="enteremoji('long_laugh');document.getElementById('mango_smileys').style.display='none'">
				<img src="emoticons/long_laugh.png" style="height:5%; width:30px">
				</td>
				<td style="width:20%"></td>
				<td style="width:20%"></td>
				<td style="width:20%"></td>
				<td style="width:20%"></td>
				</tr>
				</table>
				
				</div>
				
					 </td>
					 <td style=" width:70%; padding-top:0px">
					 <input type="hidden" name="convref" id="convref" value="" />
					 <input type="hidden" name="convuser" id="convuser" value="" />
					<input type="hidden" id="convusermsg" name="convusermsg"/>
					<div contentEditable="true" id="convusermsg_div" style=" outline:none; border:2px #555 solid; font-size:13px; height:30px; max-width:100%; overflow-x:auto; white-space:normal; width:100%; padding-top:3px; border-radius: 15px; overflow-y:auto">type your message here...</div>
					</td>
					<td style="width:5%; padding-top:8px">
					
                    <i onClick="if(document.getElementById('convref').value){sendsubmit();refreshingconv2(document.getElementById('convref').value);}" class="fa fa-send" style="height:40px; width:40px"></i>
					
					</td>
					<td style="width:20%; padding-top:2px">
					
					</td>
                         </tr>
						 </table>     
                </div>

            </div>

            </div>
			
			
			

<script>
var a = 0;
function showmangostore(){
if(a==0){
document.getElementById('store_drawer').style.width='100%';
document.getElementById('mangostoretext').innerHTML='Chat Screen Interface';
document.getElementById('conv_drawer').style.display='none';
document.getElementById('chats_drawer').style.display='none';
a=1;
}else{
document.getElementById('store_drawer').style.width='';
document.getElementById('mangostoretext').innerHTML='Shop Only Interface';
document.getElementById('conv_drawer').style.display='';
document.getElementById('chats_drawer').style.display='';
a=0;
}
}
</script>


            <div class="column right" id="store_drawer" style="transition:all 1s" onMouseOver="document.getElementById('mango_sync').style.display='none';document.getElementById('mango_cart').style.display='none';document.getElementById('mango_contact').style.display='none';document.getElementById('mango_wallet').style.display='none';document.getElementById('mango_mail').style.display='none';document.getElementById('mango_shortcuts').style.display='none';document.getElementById('mango_active').style.display='none'">

                <div class="head-section">

                    <div class="headRight-sub"> 
					<button>
                            <i class="fas fa-envelope-open-dollar fa-lg" id="send-money-i"></i>
                        </button>
                        <span style="padding-left: 5px; padding-right: 2.5px;">
                        <button>
                            <i class="fas fa-credit-card fa-lg" id="credit-card-i"></i>
                        </button>
                        </span>
                        <span style="padding-right: 2.5px; padding-left: 2.5px;">
                        <button>
                            <i class="fas fa-graduation-cap fa-lg" id="schools-i"></i>
                        </button>
                        </span>
                        <span style="padding-left: 2.5px; padding-right: 5px;">
                        <button>
                            <i class="fab fa-safari fa-lg" ></i>
                        </button>
                        </span>
                        <button>
                            <i class="far fa-shopping-cart fa-lg" id="cart-i"></i>
                        </button>
					



  
				
				   
						
						<!--
						
                        <span class="mangoaddonstop" title="Checkout" onClick="document.getElementById('shop').style.display='none';document.getElementById('wallet').style.display='';">
                          Mango Cart
                        </span>
						
                        <span class="mangoaddonstop" title="Payments And Transactions" onClick="document.getElementById('shop').style.display='none';document.getElementById('wallet').style.display='';">
                        Get Prepaid
                        </span>
                         -->
						 
                    </div>
					
                </div>




				<div align="right" 
				onClick="showmangostore()" 
				style="color:#000; 
				border-bottom:1px #ddd solid; 
				font-size:24px">
				<span id="mangostoretext" 
				style="color:#000; 
				font-size:12px; 
				float:left; 
				margin-top:10px; 
				margin-left:10px">
					<i class="fas fa-expand fa-lg"></i>
				</span>
				</div>
				
				<div id="personal-profile"
				style="
			padding: 10% 5%;
			height:85%;
			overflow-y: scroll;
			overflow-x: hidden;
			display: none;">
				  
				  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
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
		 ?>
		 
		    <div 
				style="float: right;">
				<i 
				class="fas fa-times fa-lg"
				id="close-profile"></i>
				</div>
				
				<div 
				style="
				width: 45%;
				padding-left:35%;">
					<img 
					src="<?php echo $photo; ?>" 
					class="avatar"/>
				</div>
				<br>
			
				 	<table style="
					 height:40px; 
					 width:100%">
				<tr 
				style="
				vertical-align:middle;">
<form method="post" action="profile.php" enctype="multipart/form-data">
<input type="file" name="prfileToUpload1" id="prfileToUpload1" accept="image/*" style="display:none" onChange="document.getElementById('upltext1').innerHTML='Selected'">
                
                <td 
				style="
				width:50%;
				text-align: center;">
				<div
				id="change-prof-pic-div">
				<label id="change-prof-pic"
				for="fileToUpload1">
					Upload
				</label>
				</div>
				</td>
				<td 
				style="
				width:50%;
				text-align:center;">
					<button style="float: left;"
					type="submit"
					id="save-photo">
						Save 
					</button>
				</td>
				</form>
				</tr>
				</table>
				  
				  <hr style="
					  	width:180px;
						border-width: 1px;">
				  	<div 
					style="
					text-align:center;
					width: 100%;
					">
				  		<span
				  		id="visible">
					  		Visibility
				  		</span>
					</div>
					<br>
				  
				  
				  	  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['active']=='no' || $row5['active']=='' || $row5['active']==' '){
		$active='yes';
		 }else{
		$active='no';
		 }
		 }else{
		$active='no';
		 }
		 }else{
		$active='no';
		 }
		 ?>
		 
				<div 
				style="width: 100%;
				text-align:center;">
					<a href="#">
				  		<button type="submit" 
								title="Change Visibility"
								id="visibility-button">
									Active
						</button>
				  	</a>
				</div>
				  
				  <hr style="
					  	width:180px;
						border-width: 1px;">
				
				  <div 
					style="
					text-align:center;
					width: 100%;
					">
				  		<span
				  		id="chat-back">
					  		Background
				  		</span>
					</div>
				  <br>
				  
					<table 
					style="
					height:40px; 
					width:100%">
						<tr 
						style="
						vertical-align:middle;">
							<td 
							style="
							width:50%;
							text-align:center;">
						<form 
						method="post" 
						action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
							<input 
							type="file" 
							name="fileToUpload" 
							id="fileToUpload" 
							onChange="document.getElementById('upltext2').innerHTML='Selected'" 
							accept="image/*" 
							style="display:none" 
							onChange="cam(this)">

							<div id="change-prof-pic-div">
								<label id="change-prof-pic"
								for="fileToUpload">
										Choose
									</label>
							</div>
						</td>
						<td 
						style="
						width:50%;
						text-align:center;">
							<button
							style="float: left;" 
							type="submit"
							id="save-photo">
								Save 
							</button>
						</td>
						</form>
					</tr>
				</table>

				<hr style="
					width:180px;
					border-width: 1px;">
				  
				  
				    <form method="post" action="profile.php"
				    style="
					width:90%;
					margin-left:6%;
					padding:0 2%;">
            
						  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['first_name']!=='' && $row5['first_name']!==' '){
		$a=$row5['first_name'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
			
			
			<b>First Name</b>
						  <b style="float:right;
						  padding-right:25%;">
				  		Last Name</b>
				  		<br>		
						<input 
						type="text" 
						placeholder="first name" 
						value="<?php echo $a; ?>" 
						style="height:30px; 
						text-align:center; 
						width:48%;
						border: 1px solid #bfbfbf;
						border-radius:5px;
						font-size:15px;
						font-family:'Roboto',serif;
						outline:none;"  
						name="prfirst_name">
								  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['last_name']!=='' && $row5['last_name']!==' '){
		$a=$row5['last_name'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
            <input 
						type="text" 
						placeholder="last name" 
						value="<?php echo $a; ?>" 
						style="
						height:30px; 
						text-align:center; 
						width:48%;
						float:right;
						border: 1px solid #bfbfbf;
						border-radius:5px;
						font-size:15px;
						font-family:'Roboto',serif;
						outline:none;" 
						name="prlast_name">
            <br>
			<br>		
			
			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['id_number']!=='' && $row5['id_number']!==' '){
		$a=$row5['id_number'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
            <b>ID Number</b>
					  <b
					  style="float:right;
						  padding-right:18%;">
				  	Mobile Number</b>
				  	<br>
					<input 
					type="number" 
					placeholder="ID number" 
					value="<?php echo $a; ?>" 
					style="
						height:30px; 
						text-align:center; 
						width:48%;
						border: 1px solid #bfbfbf;
						border-radius:5px;
						font-size:15px;
						font-family:'Roboto',serif;
						outline:none;" 
					 name="prid_number"
					>
					  			
					  			
					  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['mobile_number']!=='' && $row5['mobile_number']!==' '){
		$a=$row5['mobile_number'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
           <input 
					type="hidden" 
					placeholder="mobile number" 
					value="<?php echo $a; ?>" 
					style="
						height:30px; 
						text-align:center; 
						width:48%;
						float:right;
						border: 1px solid #bfbfbf;
						border-radius:5px;
						font-size:15px;
						font-family:'Roboto',serif;
						outline:none;"  
					name="prmobile_number">
					
					<input type="tel" 
					placeholder="mobile number" 
					value="<?php echo $a; ?>" 
					style="
						height:30px; 
						text-align:center; 
						width:48%;
						float:right;
						border: 1px solid #bfbfbf;
						border-radius:5px;
						font-size:15px;
						font-family:'Roboto',serif;
						outline:none;"  
					name="prmobile_number">
            <br>
			<br>	
			
			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['dob']!=='' && $row5['dob']!==' '){
		$a=$row5['dob'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
		 
				  <b>Date of Birth</b>
				  <b style="float:right;
						  padding-right:35%;">
				  Email</b>
				  <br>
				  
				  
            <input 
				type="date" 
				placeholder="date of birth" 
				value="<?php echo $a; ?>" 
				style="
						height:30px; 
						text-align:center; 
						width:48%;
						border: 1px solid #bfbfbf;
						border-radius:5px;
						font-size:15px;
						font-family:'Roboto',serif;
						outline:none;" 
				name="prdob">
				
				<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['email']!=='' && $row5['email']!==' '){
		$a=$row5['email'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
            <input 
			type="email" 
			placeholder="email" 
			value="<?php echo $a; ?>" 
			style="
				height:30px; 
				text-align:center; 
				width:48%;
				float:right;
				border: 1px solid #bfbfbf;
				border-radius:5px;
				font-size:15px;
				font-family:'Roboto',serif;
				outline:none;" 
			name="premail">
            <br>
            <br>
								  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['gender']!=='' && $row5['gender']!==' '){
		$a=$row5['gender'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
            <b>Gender</b>
				<br>
				<select 
				name="prgender" 
				style="
					height:30px; 
					text-align:center; 
					width:48%;
					border: 1px solid #bfbfbf;
					border-radius:5px;
					font-size:15px;
					font-family:'Roboto',serif;
					outline:none;">
					<option 
					value="male" 
					<?php if($a=='male' || $a=''){ ?>selected="selected"<?php } ?>>
						Male
					</option>
					<option 
					value="female" 
					<?php if($a=='female'){ ?>selected="selected"<?php } ?>>
						Female
					</option>
            	</select>
            <br>
			<br>
			Shipping
			<br>
            <br>
								  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['currency']!=='' && $row5['currency']!==' '){
		$a=$row5['currency'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
           
          					  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['street']!=='' && $row5['street']!==' '){
		$a=$row5['street'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
		 
		 
            <b>Address</b>
				<br>
				<input 
				type="text" 
				placeholder="Street" 
				value="<?php echo $a; ?>" 
				style="
					height:30px; 
					text-align:center; 
					width:48%;
					border: 1px solid #bfbfbf;
					border-radius:5px;
					font-size:15px;
					font-family:'Roboto',serif;
					outline:none;" 
				name="prstreet">
								  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['city']!=='' && $row5['city']!==' '){
		$a=$row5['city'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
            <input 
				type="text" 
				placeholder="City" 
				value="<?php echo $a; ?>" 
				style="
					height:30px; 
					text-align:center; 
					width:48%;
					border: 1px solid #bfbfbf;
					border-radius:5px;
					font-size:15px;
					font-family:'Roboto',serif;
					outline:none;
					float:right;" 
				name="prcity">
            <br>
			<br>
			
			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['province']!=='' && $row5['province']!==' '){
		$a=$row5['province'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
            <input 
				type="text" 
				placeholder="Province" 
				value="<?php echo $a; ?>" 
				style="
					height:30px; 
					text-align:center; 
					width:48%;
					border: 1px solid #bfbfbf;
					border-radius:5px;
					font-size:15px;
					font-family:'Roboto',serif;
					outline:none;" 
				name="prprovince">
				
				<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['passwrd']!=='' && $row5['passwrd']!==' '){
		$a=$row5['passwrd'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
            					  			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['country']!=='' && $row5['country']!==' '){
		$a=$row5['country'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
           <select 
				name="prcountry" 
				style="
					height:30px; 
					text-align:center; 
					width:48%;
					border: 1px solid #bfbfbf;
					border-radius:5px;
					font-size:15px;
					font-family:'Roboto',serif;
					outline:none;
					float:right;">
					<option 
					value="zambia" 
					<?php if($a=='zambia' || $a=''){ ?>selected="selected"<?php } ?>>
						Zambia
					</option>
            </select>
			
			<br>
			<br>
			
			<?php
	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".number."' ORDER BY id DESC LIMIT 1";
    //Execute the query
    $result5=mysqli_query($connect, $query5);
		if(mysqli_num_rows($result5)>0){
		if($row5=mysqli_fetch_array($result5)){
		if($row5['zip_code']!=='' && $row5['zip_code']!==' '){
		$a=$row5['zip_code'];
		 }else{
		$a=''; 
		 }
		 }else{
		$a='';
		 }
		 }else{
		$a='';
		 }
		 ?>
           <input 
			type="number" 
			placeholder="zip-code" 
			value="<?php echo $a; ?>" 
			style="
				height:30px; 
				text-align:center; 
				width:48%;
				border: 1px solid #bfbfbf;
				border-radius:5px;
				font-size:15px;
				font-family:'Roboto',serif;
				outline:none;" 
			name="przip_code"> 
            <br>
			<br>
			
			<input 
			id="profile-save-button"
			type="submit" 
			value="Save Changes">

        </form>
        
		<script id="mango-profile-script">
						$(document).ready(function(){

							$("#mangosettings-profile").click(function(){
							$("#personal-profile").show(300);
							});
							$("#close-profile").click(function(){
							$("#personal-profile").hide(300);
							});
						
						});
					</script>
				  <br>
				  <br>
				  
                </div>


</div>

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
}

/* Firefox */
input[type=number] {
	-moz-appearance: textfield;
}
</style>

<div align="center" style="padding:20px">






<?php 

if(isset($_GET['start'])){
$start=$_GET['start'];
$limit=$start*60;
}else{
$start=1;
$limit=0;
}

?>

 


</div>

</div>

<div id="wallet" style="height:500px; display:none; overflow-y:auto; overflow-x:hidden; width:100%; color:#000; font-size:14px; background:#fff">

                         <table style="width:100%; height:30px">
						 <tr style="vertical-align:middle" align="center">
						 <td class="mangoaddonstop" title="Inbox" onClick="document.getElementById('shop').style.display='';document.getElementById('wallet').style.display='none';" style="width:50%">
						 <a style="color:inherit">
                        Inbox
						</a>
						</td>
						 <td class="mangoaddonstop" title="Sent Box" onClick="document.getElementById('shop').style.display='none';document.getElementById('wallet').style.display='';" style="width:50%">
						 <a style="color:inherit">
                        Sent Box
						</a>
						</td>
						</tr>
						</table>


<div style="padding:20px">

		
				
</div>				
				
				
				
				


</div>
</div>


</div>
        

    </div>
</body>
</html>




<script type="text/javascript">
function sendsubmit(){
			
			document.getElementById('convusermsg').value=document.getElementById('convusermsg_div').innerHTML;
			
			var a = document.getElementById('convuser').value;
			var b = document.getElementById('convusermsg').value;
			var c = document.getElementById('convref').value;
			
$.ajax({
			type:'POST',
			url:'sendmsg.php',
			dataType:'html',
			data:{convuser:a,convusermsg:b,convref:c},
			cache:false,
			success: function(response){
			refreshing('<?php echo number; ?>');
			}
			});
			
}

function refreshing(e){
$.ajax({
			type:'POST',
			url:'refresh.php',
			dataType:'html',
			data:{user:e},
			cache:false,
			success: function(response){
			document.getElementById('refresh').innerHTML=response;
			}
			});
			}

var e = '<?php echo number; ?>';
setInterval(function(){refreshing(e);},7000);			
			</script>


<!--
<audio id="startaudio">
<source src="sounds/1.wav" type="audio/wav">
</audio>
<script type="text/javascript">
var a=document.getElementById('startaudio');
function startsound(){
a.play();
}

</script>
-->

<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
	
        a = li[i].getElementsByTagName("a")[i];
        if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>
<style>

.searchname::-webkit-input-placeholder{
color:#000;
font-style:normal;
}
</style>


<style>
* {
  box-sizing: border-box;
}

#myInput {
background-color:none;
  font-size: 13px;
  height:35px;
  width:40%;
  color:#000;
  border-radius:0px;
   margin-top:-5px;
  margin-bottom:0px;
  padding: 0px 0px 0px 5px;
  border:none;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  text-decoration: none;
}

#myUL li a.header {
   background:#ddd;
  cursor: default;
  color:#fff;
}

</style>



<?php
}
?>