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
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
  <link rel="stylesheet" href="nav_bar.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="./register.js"></script>
</head>

<body>
  <div>
    <?php
    $error = null;
    if (isset($_POST['create'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $password = $_POST['pass'];
      $cpassword = $_POST['cpass'];
      $accounttype = $_POST['accounttype'];
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $email = $_POST['email'];
      $select = "SELECT * FROM users WHERE email = '$email'";
      $stmtselect = $db->prepare($select);
      $selectResult = $stmtselect->execute();
      if($selectResult){
        if($stmtselect->rowCount() > 0)
          $error = "An user with this email exists already!";
        else
        {
            $sql = "INSERT INTO users (firstname, lastname, password, email, accounttype) VALUES(?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $hashedPassword, $email, $accounttype]);
            if ($result) {
              header("Location: login.php");
              die();
            } else {
              $error = "Error in saving";
            }
        }
      }
      else{
        $error = "Couldn't access database!";
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
          <i class='bx bx-x'></i>
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
  <div>
    <?php
      if($error != null){
        ?> <style>.error-message{display: block}</style> <?php
      }
      ?>
  </div>
  <div class="register-form">
    <div class="container">
      <div class="title">Registration</div>
      <div>
         <p class="error-message">
          <?php 
            echo $error;
          ?>
          </p>
      </div>
      <div class="content">
        <form id="form" action="register.php" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" placeholder="Enter your first name" id="firstname" name="firstname" required>
            </div>
            <div class="input-box">
              <span class="details">Last name</span>
              <input type="text" placeholder="Enter your last name" id="lastname" name="lastname" required>
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" placeholder="Enter your password" id="password" name="pass" required>
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" placeholder="Confirm password" id="cpassword" name="cpass" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" placeholder="Enter your email" id="email" name="email" required>
            </div>
            <div class="input-box">
              <span class="details">Account Type</span>
              <select name="accounttype" >
                <option value="USER" >USER</option>
                <option value="ADMIN" >ADMIN</option>
              </select>
            </div>
          </div>
          <div class="button">
            <input type="submit" id="register" name="create" value="Register">
          </div>
          <div class = "register-box">
            <span class="register-text"><a href = "login.php">I already have an account</a></span>
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
