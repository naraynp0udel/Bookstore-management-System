<?php include_once 'config/auth.php'; 
include "header.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet"  href="css/style.css">
        <title>
            Book Store Management System
        </title>
    </head>
    <body>
      
        <div class="container-login-form" align="center">
    
        <form class="login-form" method="POST" action="config/main.php">
        <label for="usr_email">Email</label><br>
        <input class="login-email" type="email" name="usr_email" id="usr_email" placeholder="Email"/> <br>
        <label for="usr_password">Password</label><br>
        <input  class="login-password" type="password" name="usr_password" id="usr_password" placeholder="Password"/> <br>
        <?php insert_token(); ?><br><br>
        <input class="login-submit" type="submit" value="Sign in" name="Sign_in"/>
        
        </form>
    
</div>
    
        <?php include "footer.php";?>
      </body>
</html>