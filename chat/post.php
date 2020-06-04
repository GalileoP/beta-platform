<?php
session_start();
include ('../steamauth/userInfo.php');
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
    $fp = fopen("log.html", 'a');
    console.log("test1");
    $isAdmin = $_SESSION['isAdmin'];
    $fp = fopen("log.html", 'a');

    $href = $steamprofile['profileurl'];

    if($isAdmin == true){
        fwrite($fp, "<div id='msg' class='msgln'><b><a style='color: #ce402c; text-decoration: none; cursor: pointer;' href='$href'>".$_SESSION['name']."</a></b>: ".stripslashes(htmlspecialchars($text))."</div>");
    }
    else{
        fwrite($fp, "<div id='msg' class='msgln'><b><a style='color: #587280; text-decoration: none; cursor: pointer;' href='$href'>".$_SESSION['name']."</a></b>: ".stripslashes(htmlspecialchars($text))."</div>");
    }
    fclose($fp);
}
?>