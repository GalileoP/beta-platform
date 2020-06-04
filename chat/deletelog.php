<?php
session_start();
if(isset($_SESSION['name'])){
    $cmd = $_POST['cmd'];
    if($_SESSION['isAdmin'] && ($cmd == 'clear')) {
        $fp = fopen("log.html", 'w+');
        fwrite($fp, "");
        fclose($fp);
    }
}
?>