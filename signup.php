<?php 
include_once 'config/token.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <title>
        Book Store Management System
    </title>
    <script>
        function checkpass() {
            if (document.getElementById("upass").innerHTML == document.getElementById("ucpass").innerHTML) {
                console.log("gotcha");

            } else {
                alert("Check password");
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <li class="nav-item">
            <a href="index.php" target="_blank"> Home
            </a>
        </li>
        <li class="nav-item">
            <a href="#" target="_blank"> Used Books
            </a>
        </li>
        <li class="nav-item">
            <a href="#" target="_blank"> About us
             </a>
        </li>
        <li class="nav-item">
            <a href="#" target="_blank"> Contact us
            </a>
        </li>
        <li class="nav-item">
            <a href="signin.php" target="_blank">Login</a>
        </li>
        <li class="nav-item">
            <a href="signup.php" target="_blank">Register</a>
        </li>
    </div>
    <form class="register-form" method="POST" action="config/main.php">
        <label for="f_name"> First Name </label>
            <input type="text" name="f_name" id="f_name" placeholder="First Name"><br>
        <label for="m_name"> Middle Name </label>
            <input type="text" name="m_name" id="m_name" placeholder="Middle Name"><br>
        <label for="l_name"> Last Name</label>
            <input type="text" name="l_name" id="l_name" placeholder="Last Name"><br>
        <label for="usr_email"> Email</label>
            <input type="email" name="usr_email" id="usr_email" placeholder="Email"><br>
        <label for="usr_tel"> Contact Number</label>
            <input type="tel" name="usr_tel" id="usr_tel" placeholder="Phone Number"><br>
        <label for="upass"> Password</label>
            <input type="Password " name="usr_password" id="upass" placeholder="Password"><br>
        <label for="ucpass"> Confirm Password</label>
            <input type="Password " name="usr_cpassword" id="ucpass" placeholder="Confirm Password"><br>
            <input type="hidden" name="token" value="<?php $_SESSION['token']; ?>">

        <input type="Submit" value="Sign up" name="Sign_up" onclick="checkpass();">
    </form>
    <div class="foot ">
        &copy; 2020 Bookstore Management System
    </div>
</body>
</html>