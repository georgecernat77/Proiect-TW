<?php
session_start();
if(isset($_SESSION["user"]))
    header("Location: index.php");
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Log In </title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="nav_bar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script defer src="./login.js"></script>
   </head>
<body>
    <nav>
        <div class="navbar">
          <i class='bx bx-menu'></i>
          <div class="logo"><a href="#">Zoo Web Manager</a></div>
          <div class="nav-links">
            <div class="sidebar-logo">
              <span class="logo-name">Zoo Web Manager</span>
              <i class='bx bx-x' ></i>
            </div>
            <ul class="links">
              <li><a href="#">HOME</a></li>
              <li><a href="#">ANIMALS</a></li>
              <li>
                <a href="#">ATTRACTIONS</a>
                <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                <ul class="htmlCss-sub-menu sub-menu">
                  <li><a href="#">HALLS OF THE DEPTHS</a></li>
                  <li><a href="#">REPTILE HOUSE</a></li>
                  <li><a href="#">PLAYGROUND</a></li>
                </ul>
              </li>
              <li><a href="#">BUY TICKET</a></li>
              <li><a href="#">ABOUT US</a></li>
            </ul>
          </div>
        </div>
    </nav>
    <script src="nav_bar.js"></script>
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
                <span class="forgot-pass"><a href = "./forgot-pass.html">Forgot Password?</span>
                </div>
            </div>
            <div class="button">
                <input type="submit" id="login" name="login" value="Log In">
            </div>
            <div class = "register-box">
            <span class="register-text"><a href = "register.php">Don't have an account?</a></span>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
