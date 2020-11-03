<?php
include_once 'dbconnect.php';

if(isset($_POST['Sign_up']))
{
    register_users();
}
if(isset($_POST['Sign_in']))
 {
    //  verify_user();
     login();
 }

function register_users()
{
    $con=connectdb();
    echo "<h2>"."This is trial"."</h2>";
    // $sanity_check= "<>/. ..// script alert";
    $f_name=strip_tags(trim($_POST['f_name']," "));
    $m_name=strip_tags(trim($_POST['m_name'],""));
    $l_name=strip_tags(trim($_POST['l_name'],""));
    $usr_email=strip_tags(trim($_POST['usr_email'],"+"));
    $usr_num=strip_tags(trim($_POST["usr_tel"]," "));

    $usr_pwd=$_POST['usr_password'];
    $usr_cpwd=$_POST['usr_cpassword'];
    if($usr_cpwd===$usr_pwd)
    {
        $usr_password=$usr_cpwd;
        echo " password is correct dude";
        $query = "INSERT INTO registered_users(f_name,m_name,l_name, Email,Phone_Num, Password) VALUES (?,?,?,?,?,?)";
    
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$f_name);
        $stmt->bindparam(2,$m_name);
        $stmt->bindparam(3,$l_name);
        $stmt->bindparam(4,$usr_email);
        $stmt->bindparam(5,$usr_num);
        $stmt->bindparam(6,$usr_password);
        $stmt->execute();
        header("location: ../signin.php");
    }
    else{
        echo "Check the password again dude";
    }

}
function login()
{
    $con=connectdb();
    echo "verification on construxtion";
    $query = "Select Email,Password from registered_users where Email =?";
    $stmt=$con->prepare($query);
    $stmt->bindparam(1,$usr_email);
    $usr_email=strip_tags(trim($_POST['usr_email'],""));
    $usr_password=$_POST['usr_password'];
    $stmt->execute();
    $result=$stmt->fetch();
    if($usr_password===$result['Password'])
    {
        echo "Connection succed";
        header("location: ../index.php");
    }
    else{
        die("get the fooooooooookkkkkkkkkkkkkkiiiiiiiiiiiiiinnnnnnnnnnnnnnnnnnggggggggggg out of my system" );
        header("location: ../signin.php ");
    }

    
} 
?>