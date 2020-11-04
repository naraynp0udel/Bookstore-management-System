<?php

function generate_token()
{
if(!isset($_SESSION))
{
    session_start();
   
}
if(empty($_SESSION['token']))
{
    $_SESSION['token']=bin2hex(random_bytes(32));
}
}
function insert_token()
{
     generate_token();
     echo '<input type="hidden" name="token" value="' . $_SESSION['token'] . '" />';
}
function verify_token()
{
    generate_token();
    if(!empty($_POST['token']))
    {
        if(hash_equals($_SESSION['token'],$_POST['token']))
        {
            unset($_SESSION['token']);
            return true;
            
        }
        else{
            echo "Invalid CSRF token";
            return false;
        }
    }
    else{
        echo "CSRF token is missing";
        return false;
    }
}
?>