<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     
    $fp = fopen("log.html", 'a');
    $admins = array('76561198840116213','76561198346993827', '76561198354130456');
    $isAdmin = false;
    foreach($admins as $admin){
        if($_SESSION['steamid'] == $admin){
            $isAdmin = true;
        }
    }
    if($isAdmin == true){
     fwrite($fp, "<div class='msgln'><b><span style='color: #ce402c;'>".$_SESSION['name']."</span></b>: ".stripslashes(htmlspecialchars($text))."</div>");
    }
    else{
        fwrite($fp, "<div class='msgln'><b><span style='color: #587280;'>".$_SESSION['name']."</span></b>: ".stripslashes(htmlspecialchars($text))."</div>");
    }
    fclose($fp);
}
?>