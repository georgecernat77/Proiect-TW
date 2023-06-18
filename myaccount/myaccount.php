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
    <link rel="stylesheet" href="myaccount.css">
    <link rel="stylesheet" href="../navbar/nav_bar.css">
    <script defer src="../sidebar/sidebar.js"></script>
    <script defer src="myaccount.js"></script>
    <script defer src="appointments.js"></script>
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
                <li><a href="#" class="active">Account Details</a></li>
                <li><a href="../changepass/changepass.php">Change Password</a></li>
                <li><a href="../addanimal/addanimal.php" class="admin-option ">Add/Remove Animal</a></li>
                <li><a href="../logout/logout.php">Log out</a></li>
            </ul>
        </div>
        <div class="content-wrapper">
            <div class="register-form">
                <div class="container">
                    <div class="title profile-details-title">Profile Details</div>
                    <div>
                        <p class="error-message">
                        </p>
                    </div>
                    <div class="content">
                    <form action="" method="post" id="update-form">
                    <div class="user-details">
                        <div class="input-box fname">
                        <span class="details">First Name</span>
                        <input type="text" value="<?php echo $_SESSION['firstname']; ?>" id="firstname" name="firstname" required >
                        </div>
                        <div class="input-box lname">
                        <span class="details">Last Name</span>
                        <input type="text" value="<?php echo $_SESSION['lastname']; ?>" id="lastname" name="lastname" required >
                        </div>
                        <div class="input-box phone">
                        <span class="details">Phone Number</span>
                        <input type="tel" value="<?php echo $_SESSION['phonenumber']; ?>" id="phone" name="phone"  pattern="[0-9]{10}" required>
                        </div>
                        <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" value="<?php echo $_SESSION['user']; ?>" id="email" name="email" required disabled>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" id="update-button" value="Update" name="update" >
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="appointments-box">
  <div class="container">
    <div class="title">Your Visits</div>
    <table class="appointments-table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Place</th>
        </tr>
      </thead>
        <tbody id="appointments-table-body">
        </tbody>
    </table>
  </div>
</div>

        </div>
    </div>
    <input type="hidden" id="accountType" value="<?php echo $_SESSION['accounttype']; ?>">
</body>
</html>
