<?php

    //check connection to db that it is not the first time.
    
if(isset($_SESSION['mobilenumber'])){   
$_SESSION['user_name']=$_SESSION['mobilenumber'];
$accountuser=$_SESSION['mobilenumber'];
    define("chat_number", $_SESSION['user_name']);

    define("number", $_SESSION['user_name']);
}
    include('../config/db_connect.php');
?>


<style>
.talkbubble2{
width:60%;
color:#000;
min-height:30px;
background-color:#fff;
position:relative;
float:left;
font-size:12px;
margin-bottom:5px;
padding:5px 8px 5px 8px;
border-radius:0px 20px 20px 20px;
}
.talkbubble2:before{
content:"";
position:absolute;
right:100%;
top:0px;
width:0;
height:0;
border-top:0px solid transparent;
border-right:5px solid #fff;
border-bottom:8px solid transparent;
}
</style>



<style>
.talkbubble4{
width:60%;
color:#000;
min-height:30px;
background-color:#f60;
position:relative;
float:right;
font-size:12px;
margin-bottom:5px;
padding:5px 8px 5px 8px;
border-radius:20px 0px 20px 20px;
}
.talkbubble4:before{
content:"";
position:absolute;
left:100%;
top:0px;
width:0;
height:0;
border-top:0px solid transparent;
border-left:5px solid #f60;
border-bottom:8px solid transparent;
}
</style>


<style>
	.navscroll::-webkit-scrollbar{
	width:6px;
	background-color:none;
	}
	.navscroll::-webkit-scrollbar-thumb{
	width:6px;
	background-color:#888;
	border-radius:10px;
	height:4px; 
	}
	.navscroll::-webkit-scrollbar-track{
	-webkit-box-shadow: insert 0 0 6px rgba(0,0,0,0.7);
	background:none;
	margin-top:4px;
	}
	</style>
    
    




		
				<?php
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
		 ?>




<!-- drawer -->

<div id="drawerbg" onclick="document.getElementById('mangostore_conv').style.display='none';document.getElementById('drawer1').style.display='none';document.getElementById('drawer2').style.display='none';document.getElementById('drawer3').style.display='none';document.getElementById('drawerbg').style.display='none';" style="position:fixed; width:100%; z-index:9999; height:100%; background:rgba(0,0,0,0.7); left:0px; top:0px; z-index:9999; color:#f60; font-size:18px; display:none; padding-top:350px" align="center">
<span style="margin-left:100px">Press <b style="color:#fff">ESC</b> key or tap here to dismiss</span>
</div>





<div id="mangostore_conv" style="position:fixed; display:none; top:0px; left:0px; width:40%; height:100vh; z-index:999999; box-shadow:2px 2px 10px #555; background:#fff; font-size:14px; color:#000">

<div id="chat_conv_space" style="width:100%">
	
	
<table style="height:7vh; width:100%; border:none; <?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?>; padding-top:7px">
<tr style="vertical-align:middle">
<td align="center" style="width:10%;<?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?> ">
    
    
										<i onclick="document.getElementById('mangostore_conv').style.display='none';document.getElementById('drawer1').style.display='';" class="far fa-arrow-left fa-lg" style=" cursor: pointer;" 

										></i>
</td>
<td style="width:10%">
</td>
<td align="left" style="width:50%; padding-left:5px; <?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?> ">
    <a href="#profilepage">
        <span style="font-size:15px; font-weight:600; <?php if($theme=='dark'){echo 'color:#fff';}else{echo 'color:#000';}
?>" id="conversation_name">Choose a chat</span>
</a>
</td>
<td style="width:30%" align="right">


								<div style="

								display: flex;  float:right;

								right:0;<?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?>  " 

								align="right">

                                
                                
										<i 

					onClick="document.getElementById('mango_webcam').setAttribute('class','divbottomdockhandup');document.getElementById('mango_webcam').style.display=''" class="far fa-video fa-lg" 

										style=" cursor: pointer; margin-right:20px" 

										></i>
										
										
										<i class="far fa-phone fa-lg" 

										style=" cursor: pointer; margin-right:20px" 

										></i>
										
										

                                <span onclick="menu_options()" style="margin-right:20px; margin-top:-2px">

                                <i  class="fas fa-ellipsis-v fa-lg" style="cursor: pointer;" id="menu-options"></i>

                                </span>
		

				
								

<script type="text/javascript">
var a = 0;
function menu_options(){
if(a==0){
document.getElementById('mango_options').style.display='';
a=1;    
}else{
document.getElementById('mango_options').style.display='none';
a=0;    
}
}
</script>



				<div align="left" id="mango_options"

									style="display:none; 

									margin-top: 55px;

									overflow-y:auto; 

									position:absolute;

									padding-left: 0px;

									padding-top: 10px;	

									width:220px; 

									height:400px;

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


										<div onClick="extendminimizechat()" id="extendchat" class="mangooptions">

										Extend Chat

										</div>
<!--
										<div class="mangooptions">

										View Profile

										</div>

										<div class="mangooptions">

										Mute Notifications

										</div>

										<div class="mangooptions">

										Clear Chat

										</div>

										<div class="mangooptions">

										Delete Chat

										</div>
-->
									</div>

							
<script type="text/javascript">
var b=0;
    function extendminimizechat(){
    if(b==0){
    document.getElementById('extendchat').innerHTML='Minimize Chat';
    document.getElementById('mangostore_conv').style.width='100%';
document.getElementById('mango_options').style.right='2%';
    b=1;
    menu_options();
}else{
    b=0;
    document.getElementById('extendchat').innerHTML='Extend Chat';
    document.getElementById('mangostore_conv').style.width='40%';
document.getElementById('mango_options').style.right='';
    menu_options();
}
}
</script>

</div>
						


								

								

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

								




</td>
</tr>
</table>

<div align="center" style="height:10vh; width:100%; overflow-x:hidden; white-space:nowrap; border:none; <?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?>; padding-top:7px">



</div>




<input id="myInput" onKeyUp="myFunction()" align="center" style="height:5vh; color:#f60; outline:none; padding-top:5px; font-size:15px; width:100%; text-decoration:none; border:none;<?php
if($theme=='dark'){echo 'background:#222';}else{echo 'background:#fff';}
?>; padding-top:7px" placeholder="Type to filter"/>






				<?php

	$query5="SELECT * FROM mango_user_credentials WHERE mobile_number='".chat_number."' ORDER BY id DESC LIMIT 1";

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

                <div id="conversations" class="navscroll" style="overflow-y: scroll; background:#ddd; background-image:url(<?php echo $bg; ?>); background-repeat:no-repeat; padding:20px; background-position:center; background-size:100% 100%; width:100%; height:60vh; max-height:60vh">


</div>





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








<div align="center" style="height:5vh; width:100%; border:none; <?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?>; padding-top:7px">


<span onclick="insert_suggested_emoji('laugh')" id="laugh" class="myUL2"><img src="emoticons/long_laugh.png" style="height:30px; width:30px; display:inline-block; margin-right:5px" /></span>
<span onclick="insert_suggested_emoji('angry')" class="myUL2" id="angry"><img src="emoticons/angry.png" style="height:30px; width:30px; display:inline-block; margin-right:5px"/></span>
<span onclick="insert_suggested_emoji('smile')" class="myUL2" id="smile"><img src="emoticons/smile.png" style="height:30px; width:30px; display:inline-block; margin-right:5px"/></span>






<script type="text/javascript">

var filter='';
var char;

function myFunctionsuggestionreset(){
    li = document.getElementsByClassName("myUL2");
    for (i = 0; i < li.length; i++) {
            li[i].style.display = "";
    }
}

function myFunctionsuggestiontype() {
char=window.event.keyCode;
if(char!==32){
filter=filter+String.fromCharCode(char);
myFunctionsuggestion(filter);
}else{
filter='';
myFunctionsuggestionreset();
}
}



function myFunctionsuggestion(c) {
filters=c;
    var filters, li, i;

    li = document.getElementsByClassName("myUL2");
    for (i = 0; i < li.length; i++) {

        if (li[i].id.toUpperCase().indexOf(filters) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }

    }

}

function insert_suggested_emoji(sel){
if(filter!==''){
var z = document.getElementById('convusermsg_div').innerHTML;
var x = document.getElementById('convusermsg_div').innerHTML.length;
var y = filter.length;
z=z.slice(0,x-y);
document.getElementById('convusermsg_div').innerHTML=z;
enteremoji(sel);
filter='';
}else{
enteremoji(sel);
}
}
</script>



</div>
<div align="center" style="height:15%; width:100%; border:none; <?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?> ">


<script type="text/javascript">

function enteremoji(a){

var b = document.getElementById('convusermsg_div');

if(a=='long_laugh'){

b.innerHTML=b.innerHTML+"<img src='emoticons/long_laugh.png' style='width:14px; height:14px'/>";

}
if(a=='laugh'){

b.innerHTML=b.innerHTML+"<img src='emoticons/laugh.png' style='width:14px; height:14px'/>";

}

if(a=='smile'){

b.innerHTML=b.innerHTML+"<img src='emoticons/smile.png' style='width:14px; height:14px'/>";

}

if(a=='angry'){

b.innerHTML=b.innerHTML+"<img src='emoticons/angry.png' style='width:14px; height:14px'/>";

}



document.getElementById('convusermsg').value=document.getElementById('convusermsg_div').innerHTML;



}

</script>





				



					 <table id="clockwork_chatbox" style="width:100%; height:50px">

					 <tr style="vertical-align:middle" align="center">

					 <td style="width:15%">

					 <span onClick="document.getElementById('mango_smileys').style.display=''"><img src="emoticons/long_laugh.png" style="height:20px; width:20px"></span>

					 

					 

					 

				<div id="mango_smileys" 

				align="center" 

				style="

				overflow-y:auto; 

				position:fixed; 

				bottom:5%; left:10px;

				width:200px;  display:none;

				height:100px; 

				<?php
if($theme=='dark'){echo 'background:#222; color:#fff';}else{echo 'background:#fff; color:#000';}
?>;

				transition:all .3s; 

				overflow-y:auto; 

				box-shadow:5px 5px 10px grey; 

				border-radius:15px; 

				padding:5px">

		

				<div align="right" 

				onClick="document.getElementById('mango_smileys').style.display='none'" 

				style="width:100%; 

				font-size:20px; 

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

					 <td style=" width:65%; padding-top:0px">

					 <input type="hidden" name="convref" id="convref" value="" />

					 <input type="hidden" name="convuser" id="convuser" value="" />

					<input type="hidden" id="convusermsg" name="convusermsg"/>

					<div onkeyup="myFunctionsuggestiontype()" contentEditable="true" id="convusermsg_div" 

					onfocusout="if(document.getElementById('convusermsg_div').innerHTML==''){document.getElementById('convusermsg_div').innerHTML='Type your message here...';}" 

					onclick="if(document.getElementById('convusermsg_div').innerHTML=='Type your message here...'){document.getElementById('convusermsg_div').innerHTML='';}" 

					style=" outline:none; border:2px #555 solid; font-size:13px; min-height:40px; max-height:45px; overflow-x:hidden; max-width:90%; overflow-x:auto; width:90%; padding-top:3px; border-radius: 15px; overflow-y:auto">Type your message here...</div>

					</td>

					<td style="width:10%; padding-top:22px">

					

                    <i onClick="if((document.getElementById('convref').value) && (document.getElementById('convusermsg_div').innerHTML!=='Type your message here...')){sendsubmit();refreshingconv2(document.getElementById('convref').value);}" class="fa fa-send" style="height:40px; width:40px"></i>

					

					</td>

					<td style="width:10%; padding-top:2px">

					
								<div 

								class="attach" 

								style="float:right;

								padding-right: 10px; display:none;">

                                	<i class="fal fa-paperclip fa-lg" 

									style="cursor: pointer;" 

									id="menu-attach"></i>

                                		<div class="dropdown-content-attach" 

										id="dropdown-content-attach" style="bottom:105px; border-radius:5px; background:#06f; padding-top:10px; width:50px; height:190px">

                                    		<div onClick="document.getElementById('mango_send_image').setAttribute('class','divbottomdockhandup');document.getElementById('mango_send_image').style.display='';" 

											id="image-attach" style="border-radius:50%; margin-top:5px; color:#fff; height:30px; width:30px">

                                        		<i class="far fa-image fa-lg"></i>

                                    		</div>

                                    <br>

                                    		<div onClick="document.getElementById('mango_send_video').setAttribute('class','divbottomdockhandup');document.getElementById('mango_send_video').style.display='';" 

											id="camera-attach" style="border-radius:50%; margin-top:5px; color:#fff; height:30px; width:30px">

                                        		<i class="fas fa-camera-retro fa-lg"></i>

                                    		</div>


                                    <br>

                                    		<div onClick="document.getElementById('mango_code').setAttribute('class','divbottomdockhandup');document.getElementById('mango_code').style.display='';" 

											id="camera-attach" style="border-radius:50%; margin-top:5px; color:#fff; height:30px; width:30px">               

											<i class="fas fa-location fa-lg"></i>

                                    		</div>

                                    <br>

                                    <br>

                                    </div>

                                </div>

                               

								<script id="menu-attach-script">

	

									$(document).ready(function(){



										$("#menu-attach").click(function(){

										$(".dropdown-content-attach").toggle(700);

										$("#mango_send_image").hide(300);

										$("#mango_send_video").hide(300);

										});

									

									});

								</script>


					</td>

                         </tr>

						 </table>     



</div>

</div>
</div>

</div>







<span style="display:none" id="convnorepeat"></span>

<script type="text/javascript">


var bb;			

var scrolled = 0;




function refreshingconv(e){
if(bb!=='undefined'){

clearInterval(bb);

}




$.ajax({

			type:'POST',

			url:'views/layout/header-components/header-top_chat_data.php',

			dataType:'html',

			data:{user:e},

			cache:false,

			success: function(response){

			document.getElementById('mango_left_chats').innerHTML=response;

			}

			});
			
			
$.ajax({

			type:'POST',

			url:'../webapp_resources/conversations.php',

			dataType:'html',

			data:{user:e},

			cache:false,

			success: function(response){

			document.getElementById('conversations').innerHTML=response;
document.getElementById('currentconv').scrollIntoView();
			bb = setInterval(function(){refreshingconv3(e);},3000);

			}

			});



}





function refreshingconv3(z){

$.ajax({

			type:'POST',

			url:'../webapp_resources/conversations.php',

			dataType:'html',

			data:{user:z},

			cache:false,

			success: function(response){
var zz = document.getElementById('convnorepeat');
			    if(zz.innerHTML!=response.length){
			        
			zz.innerHTML=response.length;

			document.getElementById('conversations').innerHTML=response;

}
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

				

				
				
<style>
    .drawermenu_option{
        width:100%;
        height:40px;
        padding:10px;
        color:#fff;
        font-size:16px;
    }
    .drawermenu_option:hover{
        width:100%;
        height:40px;
        background:#f90;
        padding:10px;
        color:#fff;
        font-weight:600;
        font-size:16px;
    }
</style>





				<div id="internet_status" align="center" style=" position:fixed; z-index:999999999; top:60px; right:5%; min-height:65px; width:200px; color:#fff; font-size:13px; padding:7px; background:#f00; border-radius:5px; box-shadow:2px 2px 2px #555; display:none">

				    Page too dormant or check your internet connection.<br>Some of your previous actions may not have been saved.

				    <br><br>

				    <span onClick="document.getElementById('internet_status').style.display='none';" style="padding:7px; border-radius:5px; color:#f90">OK</span>

				</div>






<div id="drawer3" align="center" style="position:fixed; display:none; top:0px; right:0px; width:30%; height:100%; z-index:99999999; box-shadow:2px 2px 10px #555; padding-top:50px; background:#fff; font-size:14px; color:#000">
<b style="font-size:18px; color:#000">
Create Contact
</b>
<br>
<br>


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


</div>







<div id="drawer2" style="position:fixed; transition:all .5s; overflow-y:auto; width:35%; display:none; z-index:99999999; height:100%; background:#fff; left:0px; top:0px; z-index:999999; padding:10px; padding-top:30px; border:1px #006 solid; box-shadow:0 0 5px 5px #222; color:#000">
<b style="font-size:18px; color:#000">
Contact List
</b>

<br>
<br>

<?php include('../webapp_resources/allcontacts.php'); ?>


</div>









<div onmouseover="document.getElementById('drawernotify').style.display='none';document.getElementById('drawerprofile').style.display='none';" style="background:#eee; overflow-y:auto; display:none; height:100%; margin-top:0px; width:100%; z-index:99999; color:#000">
    
    </div>
    
    
<style>
    .drawermenuinfo_option_title{
        width:100%;
        height:40px;
        padding:10px;
        font-weight:600;
        color:#000;
        font-size:12px;
    }
    .drawermenuinfo_option{
        width:100%;
        height:40px;
        padding:10px;
        color:#000;
        font-size:16px;
    }
    .drawermenuinfo_option_drop_box{
        background:#eee;
        width:98%;
        border-radius:5px;
        min-height:40px;
        padding:10px;
        color:#000;
        font-size:16px;
    }
    .drawermenuinfo_option_drop{
        background:#eee;
        width:98%;
        border-radius:5px;
        min-height:40px;
        padding:10px;
        color:#000;
        font-size:16px;
    }
    .drawermenuinfo_option:hover{
        width:100%;
        height:40px;
        background:#f60;
        padding:10px;
        color:#fff;
        font-weight:600;
        font-size:16px;
    }
    .drawermenuinfo_option_drop:hover{
        width:100%;
        height:40px;
        background:#fff;
        padding:10px;
        color:#000;
        font-weight:600;
        font-size:16px;
    }
</style>

	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    



<div id="drawer1" class="navscroll" style="position:fixed; display:none; top:0px; left:0px; width:40%; height:100%; z-index:99999999; box-shadow:2px 2px 10px #555; overflow-y:auto; background:#fff; font-size:14px; color:#000">

        
<div style="padding:15px; margin-bottom:20px; margin-top:20px; height:30px">
<b style="font-size:18px; color:#000">
Chats
</b>
</div>

	<div id="mango_left_chats" style=" overflow-y:auto; height:80vh">

	<?php
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

		 ?>.</div>
		 
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

		echo "<p align='center' style='color:#f20; font-size:24px; font-weight:600'>Start a chat.</p>";

    }


?>
			
	</div>
        
    </div>
    
    



















				<div id="mango_fruit" class="divbottomdockhandup" align="center" style=" display:none; overflow-y:auto; position:fixed; top:30%; left:10%; width:30%; height:40%; background:#006; color:#000; overflow-y:auto; box-shadow:0 0 5px 5px #555; border-radius:10px; padding:10px">

				

				<div align="right" onClick="document.getElementById('mango_code').setAttribute('class','divdropdockhandup');document.getElementById('mango_fruit').style.display='none'" style="width:100%; font-size:24px; height:40px; border-bottom:1px #ddd solid; color:#000; padding-top:5px">

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

				

				

<style>
div.divdockhandup{
  animation: divdockhandup 3s;
}

@keyframes divdockhandup {
 10% { transform: translate(0px, 100px) scale(0.7);}
    30% { transform: translate(0px, 100px) scale(0.7);  }
    100% { transform: translate(0px, 1500px) scale(0.5); }
}


div.divdropdockhandup{
  animation: divdropdockhandup 3s;
}

@keyframes divdropdockhandup {
  20% { transform: translate(0px, 0px) scale(0.4); }
   70% { transform: translate(0px, 950px) rotate(1000deg) scale(0.4); width:50%; height:70%; }
    100% { transform: translate(300px, 1500px) rotate(1200deg); width:0%; height:0; }
}



div.divbottomdockhandup{
  animation: divbottomdockhandup 2s;
}

@keyframes divbottomdockhandup {
0% { transform: translate(0px, 500px); }
}
</style>




				<div class="divbottomdockhandup" id="mango_webcam" 

				align="center" 

				style="display:none; 

				overflow-y:auto; 

				position:fixed; 

				bottom:10%; 

				left:15%; 

				width:70%; 

				height:80%; 

				z-index:99999999; 

				background:#008; 

				color:#fff; 

				overflow-y:auto; 

				box-shadow:5px 5px 10px grey; 

				border-radius:10px;">

		

					<div align="left" 

					onClick="stop();document.getElementById('mango_webcam').setAttribute('class','divdropdockhandup');setTimeout(function(){document.getElementById('mango_webcam').style.display='none';},2500)" 

					style="width:100%; 

					font-size:35px; 

					height:40px; 

					border-radius:10px 10px 0 0;

					border-bottom:1px #ddd solid; 

					color:#fff; cursor:pointer;

					background:#008;

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



					<div style="margin-top:5px" id="container">

						<video autoplay="true" 

						id="videoElement">

						</video>

						<img src="">

						<canvas style="display:none;">

						</canvas>

					</div>



<img id="imgtaken" src="" style="position:fixed; display:none; top:70px; right:20px; height:60px; width:60px"/>



					<div align="center" 

					style="width:100%; 

					padding-top:10px;

					height:auto;">

						<table style="width:100%;">

							<tr style="vertical-align:middle">

								<td style="width:10%"

								align="center">

									<button style="border:1px #006 solid; background:#008" onClick="startcam()"

									id="start-cam-button">

										<i class="fas fa-play fa-lg"></i>

									</button>

								</td>

								<td style="width:10%"

								align="center">

									<button style="border:1px #006 solid; background:#008" onClick="stop()"

									id="stop-cam-button">

									<i class="fas fa-stop fa-lg"></i>

									</button>

								</td>

								<td style="width:10%"

								align="center">

									<a style="border:none; background:none; color:#fff" id="screenshotButton">

									Screenshot

									</a>

								</td>

								<td style="width: 10%;"

								align="center">

									<a style="border:none; background:none; color:#fff" href="" id="dlink" download>

								Download

									</a>

								</td>
								<td style="width: 12%;"

								align="center">

									<a style="border:none; background:none; color:#fff" id="webcamshare">

								Send Photo

									</a>

								</td>
								<td style="width: 48%;"

								align="center">
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

var img = document.getElementById("imgtaken");

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
  
  img.style.display='';
  
  setTimeout(function(){img.style.display='none';},5000);

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

    if(video.srcObject){

  var stream = video.srcObject;

  var tracks = stream.getTracks();



  for (var i = 0; i < tracks.length; i++) {

    var track = tracks[i];

    track.stop();

  }



  video.srcObject = null;

}

}

</script>

				

	</div>

				

				

				

				

				

				

				









				

				<div class="divbottomdockhandup" 

				id="mango_send_image" 

				align="center" 

				style="display:none; 

				overflow-x:hidden;

				overflow-y:auto; 

				position:fixed; top:25%; 

				left:20%; 

				width:32%; 

				height:32%; 

				background:#008;

				color:#fff; 

				overflow-y:auto; 

				box-shadow:5px 5px 10px grey; 

				border-radius:10px; 

				padding:10px">

		

						<div align="left"

						onClick="document.getElementById('mango_send_image').setAttribute('class','divdockhandup');setTimeout(function(){document.getElementById('mango_send_image').style.display='none';},2500)" 

						style="

						width:100%; 

						font-size:32px; 

						height:40px; 

						color:#fff; 

						cursor:pointer;

						margin-left:6%;">

						&minus; &nbsp;&nbsp;

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

					>

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

									color:#fff;

									font-family:'Roboto Slab',serif;">

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

								value="Send Image"/>

				</td>

				</tr>

				</table>

				</div>



<style>

	#send-image-textarea{

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

	#send-image-textarea:hover{

		background: #fdbd4e;

		color: #ffffff;

		box-shadow: 2px 2px 5px grey;

		border: none;

	}

</style>

				

				<br>

					<div align="center">

						<textarea

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

						height:70px; 

						width:100%" 

						maxlength="1000" 

						placeholder="caption..."

					></textarea>

				</div>

				

				

				</form>

				

				</div>





				

				

				

				

				

				

				

				

				

				

				

				

				

				<div class="divbottomdockhandup" id="mango_send_video" 

				align="center" 

				style="display:none; 

				overflow-x:hidden;

				overflow-y:auto; 

				position:fixed; top:25%; 

				left:20%; 

				width:32%; 

				height:35%; 

				background:#008;

				color:#fff; 

				overflow-y:auto; 

				box-shadow:5px 5px 10px grey; 

				border-radius:10px; 

				padding:10px">

		

					<div align="left" 

					onClick="document.getElementById('mango_send_video').setAttribute('class','divdockhandup');setTimeout(function(){document.getElementById('mango_send_video').style.display='none'},2500)" 

					style="width:100%; 

						font-size:32px; 

						height:40px; 

						color:#fff; 

						cursor:pointer;

						margin-left:6%;">

						&minus; &nbsp;&nbsp;

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

					>

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

									color:#fff;

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

						<textarea

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

						height:70px; 

						width:100%" 

						maxlength="1000" 

						placeholder="caption..."

					></textarea>

				</div>

				

				

				

				</form>

				

				</div>





				

				

				

				

				<div class="divbottomdockhandup" id="mango_code" 

				align="center" 

				style="display:none; 

				overflow-y:auto; 

				position:fixed; 

				top:70px; 

				left:10%; 

				width:420px; 

				height:600px; 

				background:#006; 

				color:#fff; 

				overflow-y:auto; 

				box-shadow:0 0 5px 5px #555; 

				border-radius:10px; 

				padding:10px">

		

				<div align="right" onClick="document.getElementById('mango_code').setAttribute('class','divdockhandup');setTimeout(function(){document.getElementById('mango_code').style.display='none'},2500)" style="width:100%; font-size:32px; height:40px; border-bottom:1px #ddd solid; color:#fff; padding-top:5px">

				&times; &nbsp;&nbsp;

				</div>

				

				<br>

				<span id="mango_loc"></span>

				<br><br>

				

				

			<style>

       /* Set the size of the div element that contains the map */

      #map {

        height: 400px;  /* The height is 400 pixels */

        width: 100%;  /* The width is the width of the web page */

       }

    </style>

    

    <!--The div element for the map -->

    <div id="map"></div>

    

				 <script>

				 var lon;

				 var lat;

				 var x = document.getElementById("mango_loc");

x.innerHTML="Location will show up here.";







// Initialize and add the map

function initMap() {

      if (navigator.geolocation) {

    navigator.geolocation.getCurrentPosition(showPosition);

  } else {

    x.innerHTML = "Geolocation is not supported by this browser.";

  }

    

function showPosition(position) {
alert('kjk');
    lon=position.coords.longitude;

    lat=position.coords.latitude;

  x.innerHTML = "Youre here : " + position.coords.latitude +

  "," + position.coords.longitude;

}





  // The location of Uluru

  var uluru = {lat: lat, lng: lon};

  // The map, centered at Uluru

  var map = new google.maps.Map(

      document.getElementById('map'), {zoom: 4, center: uluru});

  // The marker, positioned at Uluru

  var marker = new google.maps.Marker({position: uluru, map: map});

}

    </script>

    <!--Load the API from the specified URL

    * The async attribute allows the browser to render the page while the API loads

    * The key parameter will contain your own API key (which is not needed for this tutorial)

    * The callback parameter executes the initMap() function

    -->

    <script defer

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqpIzAZAWj1v3DUJTFb8cw8FZuqK6fqNs&callback=initMap">

    </script>

    

				<br>

				<br>

				

				

				<input type="button" style="width:100px; height:30px; font-size:13px; border-radius:3px; color:#fff; background:#000; border:1px #000 solid" value="Send Location">



				</div>

				

				







<style>

.mangocodes{

	padding:10px; 

	color:#000; 

	font-size:14px; 

	width:90%; 

	border-bottom:1px #ddd solid; 

	background:#fff;

	font-family:'Roboto Slab',serif;

	font-weight: 500;

}



</style>










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

			document.getElementById('convusermsg_div').innerHTML='Type your message here...';

			}

			});


}



var ar;



function refreshing(e){

if($.active==0){

    $.ajax({

			type:'POST',

			url:'refresh.php',

			dataType:'html',

			data:{user:e},

			cache:false,

			success: function(response){
			document.getElementById('drawernotify').innerHTML=response;

	 if (!("Notification" in window)) {

	if(ar!==response){
	    document.getElementById('notifyicon').style.color='#fc0';
			document.getElementById('drawernotify').style.display='';
			ar=response;

}
  }else{
	if(ar!==response){
	    document.getElementById('notifyicon').style.color='#fc0';
document.getElementById('drawernotify').style.display='';
		//	shootNotification(response,'img/profile.png','Notifications');

			ar=response;

	}

  }

		

			}

			});

	

}

			}



var e = '<?php echo number; ?>';

setInterval(function(){refreshing(e);},3000);			

			</script>




</div>

</div>





</div>

</div>

</div>

