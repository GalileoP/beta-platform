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
	top: 25px;
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
    bottom: 450px;
	padding: 50px;
	z-index: -1;
	margin: 0 auto;
	background-color: #1d2837;
	height: 425px;
	width: 300px;
	border-radius: 10px;
}
.chatbox {
    position: relative;
	text-align: left;
	margin: 0 auto;
	top: 55px;
	right: 0px;
	margin-bottom: 25px;
	color: white;
	font-family: helvetica;
	height: 450px;
	font-size: 20px;
	width: 370px;
	overflow-wrap: break-word;
	overflow: auto;
}
:root {
  --usermsg-color: #2c3d52;
  --placeholder-opacity: 0.5;
  --placeholder-color: gray;
}
.usermsg {
	width: 360px;
	padding: 10px;
	height: 20px;
	border-radius: 10px;
	color: white;
	border: none;
	background-color: var(--usermsg-color);
	outline: none;
	font-size: 18px;
	position: absolute;
	top: 660px;
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
		top: 0px;
		
	}
	.chatbox::-webkit-scrollbar {
    display: none;
	}
	.pacman{
		display: none;
	}
	.chatbox{
		right: 30px;
		position: relative;
		top: 30px;
		height: 370px;
		width: 200px;
	}
	.dfaq{
		width: 200px;
		bottom: 400px;
		height: 350px;
	}
	.usermsg{
		width: 250px;
		top: 523px;
	}
}
#wrapper{
	height: 500px;
}
::placeholder {
  color: var(--placeholder-color);
  opacity: var(--placeholder-opacity);
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
			<input id = "usermsgId" name="usermsg" placeholder="Type something.." type="text" class="usermsg"/>
			<input name="submitmsg" value="" type="submit" class="submitmsg"/>
		</form>
		<div class="dfaq"></div>
</div>
	</div></div>
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
	var characterLimit = 100;
	var timer;
	var time = 3;
	var time1 = time;
	var t = time;
	let root = document.documentElement;
// jQuery Document
$(document).ready(function(){
});

	$(".submitmsg").click(function(){
		if(t >= time && $(".usermsg").val() != "" && $(".usermsg").val().length < (characterLimit+1)) {
			var clientmsg = $(".usermsg").val();
			$.post("post.php", {text: clientmsg});				
			$(".usermsg").attr("value", "");
			loadLog;
			root.style.setProperty('--placeholder-color', "white");
			root.style.setProperty('--placeholder-opacity', "1");
			document.getElementById("usermsgId").placeholder = "You can type again in "+time1+" seconds.";
			root.style.setProperty('--usermsg-color', "gray");
			document.getElementById("usermsgId").disabled = true;
			t = 0;
			timer = setInterval(test ,1000);
		}
	return false;
});

//If user submits the form
function test() {
	t++;
	time1--;
	document.getElementById("usermsgId").placeholder = "You can type again in "+time1+" seconds.";
	//document.getElementById("time").innerHTML = time1;
	if(t>=time) {
		clearInterval(timer);
		time1 = time;
		root.style.setProperty('--usermsg-color', "#2c3d52");
		root.style.setProperty('--placeholder-color', "gray");
		root.style.setProperty('--placeholder-opacity', "0.5");
		document.getElementById("usermsgId").disabled = false;
		document.getElementById("usermsgId").placeholder = "Type something...";
		console.log("Testing");
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
			var newscrollHeight = $(".chatbox").attr("scrollHeight") - 1; //Scroll height after the request
			if(newscrollHeight > oldscrollHeight){
				$(".chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
			}		
	  	},
	});
}

setInterval (loadLog, 250);
</script>
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
</script>
</body>
</html>