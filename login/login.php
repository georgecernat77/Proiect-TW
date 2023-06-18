<?php
session_start();
if(isset($_SESSION["user"]))
    header("Location: ../myaccount/myaccount.php");
require_once('../config/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>ZooConnect</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../navbar/nav_bar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script defer src="login.js"></script>
   </head>
<body>
<nav>
        <div class="navbar">
            <i class='bx bx-menu'></i>
            <div class="logo"><a href="../index/index.php">ZooConnect</a></div>
            <div class="nav-links">
                <div class="sidebar-logo">
                    <span class="logo-name">ZooConnect</span>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li><a href="../index/index.php">HOME</a></li>
                    <li><a href="../animals/animals.php">ANIMALS</a></li>
                    <li><a href="../visitUs/visit.php">VISIT US</a></li>
                    <li><a href="../about/about.php">ABOUT US</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="../navbar/nav_bar.js"></script>
    <div class = "register-form">
        <div class="container">
        <div class="title">Welcome back</div>
        <div>
            <p class="error-message">
            </p>
        </div>
        <div class="content">
            <form id="form" action="" method="post">
            <div class="user-details">
                <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Enter your email"  id="email" name="email" required>
                </div>
                <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Enter your password"  id="password" name="pass" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" id="login" name="login" value="Log In">
            </div>
            <div class = "register-box">
            <span class="register-text"><a href = "../register/register.php">Don't have an account?</a></span>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
