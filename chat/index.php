<?php
require ('../index.php');
error_reporting(E_ERROR | E_PARSE);
		$_POST ['name'] = $steamprofile['personaname'];
		$_SESSION ['name'] = $steamprofile['personaname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<div class="chat-text">Chat</div>
<style>
form,p,span {
	margin: 0;
	padding: 0;
}

input {
	font: 12px arial;
}
.chat-text{
	position: relative;
	height: 20px;
	width: 100%;
	bottom: 10px;
	text-align: center;
	font-family: helvetica;
	color: white;
	font-size: 20px;
}
.submitmsg{
	background-color: transparent;
	outline: none;
	border: none;
}
.dfaq {
    position: relative;
    bottom: 490px;
	padding: 50px;
	z-index: -1;
	margin: 0 auto;
	background-color: #1d2837;
	height: 450px;
	width: 300px;
	border-radius: 10px;
}
.chatbox {
    position: relative;
	text-align: left;
	margin: 0 auto;
	top: 27px;
	right: 0px;
	margin-bottom: 25px;
	color: white;
	font-family: helvetica;
	height: 450px;
	font-size: 20px;
	width: 350px;
	overflow-wrap: break-word;
	overflow: auto;
}

.usermsg {
	width: 360px;
	padding: 10px;
	height: 20px;
	border-radius: 10px;
	color: white;
	border: none;
	background-color: #2c3d52;
	outline: none;
	font-size: 18px;
	position: absolute;
	top: 695px;
	left: 50%;
	transform: translate(-50%)
}

.submit {
	width: 60px;
}

.error {
	color: white;
}

.msgln {
	margin: 0 0 2px 0;
	color: white;
}
@media only all and (max-width: 600px) {
	.chat-text{
		z-index: 100;
		bottom: 60px;
		
	}
	.chatbox::-webkit-scrollbar {
    display: none;
	}
	.pacman{
		display: none;
	}
	.chatbox{
		left: 1px;
		position: relative;
		top: -30px;
		height: 370px;
		width: 270px;
	}
	.dfaq{
		width: 200px;
		bottom: 460px;
		height: 350px;
	}
	.usermsg{
		width: 250px;
		top: 513px;
	}
}
:root {
  --animation-play-state: paused;
}
#countdown {
  position: relative;
  margin: auto;
  margin-top: 150px;
  height: 25px;
  width: 25px;
  text-align: center;
}

#countdown-number {
  color: white;
  display: inline-block;
  line-height: 40px;
}

svg {
  position: absolute;
  top: 0;
  right: 0;
  width: 40px;
  height: 40px;
  transform: rotateY(-180deg) rotateZ(-90deg);
}

svg circle {
  height: 20px;
  width: 20px;
  stroke-dasharray: 113px;
  stroke-dashoffset: 0px;
  stroke-linecap: round;
  stroke-width: 2px;
  stroke: white;
  fill: none;
  animation: countdown 5s linear infinite forwards;
  animation-play-state: var(--animation-play-state);
}

@keyframes countdown {
  from {
    stroke-dashoffset: 0px;
  }
  to {
    stroke-dashoffset: 113px;
  }
}

@keyframes countdown {
  from {
    stroke-dashoffset: 0px;
  }
  to {
    stroke-dashoffset: 113px;
  }
}
</style>

<div id="wrapper">
		<div id="menu">
			<div style="clear: both"></div>
		</div>
		<div class="chatbox"><?php
		if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
			$handle = fopen ( "log.html", "r" );
			$contents = fread ( $handle, filesize ( "log.html" ) );
			fclose ( $handle );
			
			echo $contents;
		}
		?></div>
	
		<form name="message" action="" autocomplete="off">
			<input name="usermsg" placeholder="Type something.." type="text" class="usermsg"/>
			<input name="submitmsg" value="" type="submit" class="submitmsg"/>
		</form>
		<div id="countdown">
  <div id="countdown-number"></div>
  <svg>
    <circle r="12" cx="13" cy="13"></circle>
  </svg>
</div>
	</div>
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
	var characterLimit = 100;
	var timer;
	var time = 5;
	var time1 = time;
	var t = time;

	var countdownNumberEl = document.getElementById('countdown-number');
	var countdown = 5;
	let root = document.documentElement;
	countdownNumberEl.textContent = 5;

	document.getElementById("countdown").style.display = "none";
	 document.getElementById("countdown-number").style.display = "none";
// jQuery Document
$(document).ready(function(){
});

//jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
});
//If user submits the form
$(".submitmsg").click(function(){
		console.log(t);
		if(countdown == 5 && $(".usermsg").val() != "" && $(".usermsg").val().length < (characterLimit+1)) {
			var clientmsg = $(".usermsg").val();
			$.post("post.php", {text: clientmsg});				
			$(".usermsg").attr("value", "");
			loadLog;
			t = 0;
			root.style.setProperty('--animation-play-state', "running");
			document.getElementById("countdown").style.display = "block";
			document.getElementById("countdown-number").style.display = "inline-block";
			timer = setInterval(test1, 1000);
			
			
		}
	return false;
});

function test1() {
  if(countdown == 1) {
     console.log("test");
     root.style.setProperty('--animation-play-state', "paused");
	 countdown = 5;
	 countdownNumberEl.textContent = countdown;
	 clearInterval(timer);
	 document.getElementById("countdown").style.display = "none";
	 document.getElementById("countdown-number").style.display = "none";
  }else {
    countdown = --countdown <= 0 ? 3 : countdown;
	countdownNumberEl.textContent = countdown;
  }
}

function test() {
	t++;
	time1--;
	if(countdown >= 0) {
		countdownNumberEl.textContent = countdown;
		countdown--;
	}
	//document.getElementById("time").innerHTML = time1;
	if(t>=time) {
		root.style.setProperty('--animation-play-state', "paused");
		time1 = time;
	    t = time;
		countdown = 5;
		countdownNumberEl.textContent = countdown;
		clearInterval(timer);
		//document.getElementById("time").innerHTML = "Chat";
	}
}
function loadLog(){		
	var oldscrollHeight = $(".chatbox").attr("scrollHeight") - 0; //Scroll height before the request
	$.ajax({
		url: "log.html",
		cache: false,
		success: function(html){		
			$(".chatbox").html(html); //Insert chat log into the #chatbox div	
			
			//Auto-scroll			
			var newscrollHeight = $(".chatbox").attr("scrollHeight") - 10; //Scroll height after the request
			if(newscrollHeight > oldscrollHeight){
				$(".chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
			}				
	  	},
	});
}

setInterval (loadLog, 500);
</script>
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
</script>
<div class="dfaq"></div>
</body>
</html>