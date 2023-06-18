<?php
require_once('../session/session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="changepass.css">
    <link rel="stylesheet" href="../navbar/nav_bar.css">
    <script defer src="../sidebar/sidebar.js"></script>
    <script defer src="checkvalidPass.js"></script>
    <title>ZooConnect</title>
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
                    <li><a href="../myaccount/myaccount.php">MY ACCOUNT</a></li>
                    <li><a href="../visitUs/visit.php">VISIT US</a></li>
                    <li><a href="../about/about.php">ABOUT US</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="../navbar/nav_bar.js"></script>
    <div class="main">
        <div class="sidebar">
            <img src="" alt="Image">
            <div class="acc-type"><?php echo $_SESSION['accounttype']; ?></div>
            <div class="welcome-message"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];?></div>
            <ul class="sidebar-links">
                <li><a href="../myaccount/myaccount.php">Account Details</a></li>
                <li><a href="../changepass/changepass.php" class="active">Change Password</a></li>
                <li><a href="../addanimal/addanimal.php" class="admin-option">Add/Remove Animal</a></li>
                <li><a href="../logout/logout.php">Log out</a></li>
            </ul>
        </div>
        <div class="content-wrapper">
        <div class="register-form">
                <div class="container">
                    <div class="title profile-details-title">Change Password</div>
                    <div>
                        <p class="error-message">
                        </p>
                    </div>
                    <div class="content">
                    <form action="" method="post" id="update-form">
                    <div class="user-details">
                        <div class="input-box">
                        <span class="details">Old Password</span>
                        <input type="password" placeholder="Enter your password" id="oldpassword" name="opass" required>
                        </div>
                        <div class="input-box">
                        <span class="details">New Password</span>
                        <input type="password" placeholder="Enter your new password" id="newpassword" name="npass" required>
                        </div>
                        <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm new password" id="cpassword" name="cpass" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" id="update-button" value="Confirm" name="update" >
                    </div>
                    </form>
                    </div>
                </div>
            </div>
       
    </div>
    <input type="hidden" id="accountType" value="<?php echo $_SESSION['accounttype']; ?>">
</body>
</html>
