<?php include_once 'config/auth.php'; 
include "header.php";
include "footer.php";?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet"  href="css/style.css">
        <title>
            Book Store Management System
        </title>
    </head>
    <body>
      
        <form class="login-form" method="POST" action="config/main.php">
        <label for="usr_email">Email</label>
        <input type="email" name="usr_email" id="usr_email" placeholder="Email"><br>
        <label for="usr_password">Password</label>
        <input type="password" name="usr_password" id="usr_password" placeholder="Password"><br>
        <?php insert_token(); ?><br>
        <input type="submit" value="Sign in" name="Sign_in">
        
        </form>
        <?php include "footer.php";?>
      </body>
</html>