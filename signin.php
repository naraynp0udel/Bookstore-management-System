<?php include_once 'config/token.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet"  href="css/style.css">
        <title>
            Book Store Management System
        </title>
    </head>
    <body>
        <div class="container">
            <li class="nav-item">
            <a href="index.php" target="_blank">Home</a></li>
            <li class="nav-item">
            <a href="#" target="_blank">Used Books</a></li>
            <li class="nav-item">
            <a href="#" target="_blank">About us</a></li>
            <li class="nav-item">
            <a href="#" target="_blank">Contact us</a></li>
            <li class="nav-item">
            <a href="signin.php" target="_blank">Login</a></li>
            <li class="nav-item">
            <a href="signup.php" target="_blank">Register</a></li>
        </div>
        <div>
        <form class="login-form" method="POST" action="config/main.php">
        <label for="usr_email">Email</label>
        <input type="email" name="usr_email" id="usr_email" placeholder="Email"><br>
        <label for="usr_password">Password</label>
        <input type="password" name="usr_password" id="usr_password" placeholder="Password">
        <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
        <input type="submit" value="Sign_in" name="Sign_in">
        </div>
        </form>
        <div class="foot">
            &copy;2020 Bookstore Management System
        </div>
      </body>
</html>