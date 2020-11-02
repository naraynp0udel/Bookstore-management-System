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
            <a href="#" target="_blank"> Home
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
    </div>
    <form method="POST" action="config/main.php">
        <label> First Name </label>
            <input type="text" name="f_name">
        <label> Middle Name </label>
            <input type="text" name="m_name">
        <label> Last Name</label>
            <input type="text" name="l_name">
        <label> Email</label>
            <input type="email" name="usr_email">
        <label> Contact Number</label>
            <input type="tel" name="usr_tel">
        <label> Password</label>
            <input type="Password " name="usr_password" id="upass">
        <label> Confirm Password</label>
            <input type="Password " name="usr_cpassword" id="ucpass">

        <input type="Submit" value="Sign up" name="Sign up" onclick="checkpass();">
    </form>
    <div class="foot ">
        &copy; 2020 Bookstore Management System
    </div>
</body>
</html>