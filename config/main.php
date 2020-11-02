<?php
include_once 'dbconnect.php';
connectdb();
if(isset($_POST['Sign up']))
{
    echo "<h2>"+"This is juust a trial"+"</h2>";
    register_users();
}
// if(isset($_POST['Sign in']))
// {
//     Verify_user();
//     Login();
// }

function register_users()
{
    echo "<h2>"+"This is trial"+"</h2>";
    // $sanity_check= "<>/. ..// script alert";
    $f_name=trim($_POST['f_name']," ");
    $m_name=trim($_POST['m_name'],"");
    $l_name=trim($_POST['l_name'],"");
    $usr_email=trim($_POST['usr_email'],"+");
    $usr_num=trim($_POST["usr_tel"]," ");

    $usr_pwd=$_POST['usr_password'];
    $usr_cpwd=$_POST['usr_cpassword'];
    if($usr_cpwd===$usr_pwd)
    {
        $usr_password=$usr_cpwd;
        echo " password is correct dude";
        $query = "INSERT INTO registered_users(f_name,m_name,l_name, Email,Phone_Num, Password) VALUES (f_name,m_name,l_name,usr_email,usr_num,usr_password)";
        $query_success=$pdo->query($query);
        header("location: ../signin.php");
    }
    else{
        echo "Check the password again dude";
    }

}
// function Verify_user()
// {
//     echo "verification on construxtion";
// } 
?>