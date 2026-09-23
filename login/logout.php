<?php 
sleep(2);
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$_SESSION = array();
session_destroy();

header("Location: /mini_sistema/");
exit();
?>