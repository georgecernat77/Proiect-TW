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
    <div>
        <?php
            $error = null; 
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['pass'];
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $stmtselect = $db->prepare($sql);
                $result = $stmtselect->execute();
                if ($result) {
                  $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
                  if($stmtselect->rowCount() > 0){
                    if(password_verify($password, $user["password"])){
                        $_SESSION["user"] = $email;
                        $_SESSION["firstname"] = $user['firstname'];
                        $_SESSION["lastname"] = $user['lastname'];
                        $_SESSION["accounttype"] = $user['accounttype'];
                        header("Location: index.php");
                        die();
                    }
                    else{
                        $error = 'Incorrect password';
                    }
                  }else{
                        $error = 'User with that email does not exist!';
                  }
                } else {
                  $error = "Error in saving";
                }
            }
        ?>
    </div>
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
    <?php
    if($error != null){
      ?> <style>.error-message{display: block}</style> <?php
    }
    ?>
  </div>
    <div class = "register-form">
        <div class="container">
        <div class="title">Welcome back</div>
        <div>
            <p class="error-message">
                <?php 
                    echo $error;
                ?>
            </p>
        </div>
        <div class="content">
            <form id="form" action="login.php" method="post">
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
<!-- <footer>
    <div class="footer-content">
        <h4>&copy;Zoo Web Manager</h4>
        <p>Zoo Web Manager is a web application where you can discover our Zoo Garden but most importantly is a place where you can learn more details about our animals. 
        </p>
    </div>
</footer> -->
</html>
