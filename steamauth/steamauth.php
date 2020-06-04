<?php
ob_start();
session_start();

function logoutbutton() {
	echo "<script src='https://kit.fontawesome.com/a076d05399.js'></script>";
	echo "<form action='' method='get'><button name='logout' class='logout' type='submit'><i class='fas fa-sign-out-alt' style='font-size: 20px;'></i></button></form>"; //logout button
}

if (isset($_GET['login'])){
	require 'openid.php';
	try {
		require 'SteamConfig.php';
		$openid = new LightOpenID($steamauth['domainname']);
		
		if(!$openid->mode) {
			$openid->identity = 'https://steamcommunity.com/openid';
			header('Location: ' . $openid->authUrl());
		} elseif ($openid->mode == 'cancel') {
			echo 'User has canceled authentication!';
		} else {
			if($openid->validate()) { 
				$id = $openid->identity;
				$ptn = "/^https?:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
				preg_match($ptn, $id, $matches);
				
				$_SESSION['steamid'] = $matches[1];
				if (!headers_sent()) {
					header('Location: '.$steamauth['loginpage']);
					exit;
				} else {
					?>
					<script type="text/javascript">
						window.location.href="<?=$steamauth['loginpage']?>";
					</script>
					<noscript>
						<meta http-equiv="refresh" content="0;url=<?=$steamauth['loginpage']?>" />
					</noscript>
					<?php
					exit;
				}
			} else {
				echo "User is not logged in.\n";
			}
		}
	} catch(ErrorException $e) {
		echo $e->getMessage();
	}
}

if (isset($_GET['logout'])){
	require 'SteamConfig.php';
	session_unset();
	session_destroy();
	header('Location: '.$steamauth['logoutpage']);
	exit;
}

if (isset($_GET['update'])){
	unset($_SESSION['steam_uptodate']);
	require 'userInfo.php';
	header('Location: '.$_SERVER['PHP_SELF']);
	exit;
}

//Koda katera preverja admine

if(isset($_SESSION['name'])){
    $steamId = $_SESSION['steamid'];
}else {
    $steamId = "null";
}
$admins = array('76561198840116213','76561198346993827', '76561198354130456');
$_SESSION['isAdmin'] = false;
    
foreach($admins as $admin){
    if($steamId == $admin){
        $_SESSION['isAdmin'] = true;
    }
}



// Version 4.0

?>
