<?php
session_start();
include_once 'token.php';
include_once 'main.php';
include_once 'dbconnect.php';

if($_POST['token']!=NULL)
{
    if($_POST['token']==$_SESSION['token'])
    {
        header('location: main.php');
    }
    else
    {
        echo "Invalid CSRF token";
    }
}
else
{
    echo "CSRF token is missing";
}
?>