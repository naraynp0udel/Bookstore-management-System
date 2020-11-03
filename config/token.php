<?php
session_start();
if(empty($_SESSION['token']))
{
    $_SESSION['token']=bin2hex(random_bytes(32));
    $_SESSION['expirytime']=time()+3;
}

?>