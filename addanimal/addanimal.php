<?php
require_once('../session/session.php');
require_once('checkadmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="addanimal.css">
    <link rel="stylesheet" href="../navbar/nav_bar.css">
    <script defer src="../sidebar/sidebar.js"></script>
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="navbar">
            <i class='bx bx-menu'></i>
            <div class="logo"><a href="#">ZooConnect</a></div>
            <div class="nav-links">
                <div class="sidebar-logo">
                    <span class="logo-name">ZooConnect</span>
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
            <div class="welcome-message"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></div>
            <ul class="sidebar-links">
                <li><a href="../myaccount/myaccount.php">Account Details</a></li>
                <li><a href="../changepass/changepass.php">Change Password</a></li>
                <li><a href="../addanimal/addanimal.php" class="admin-option active">Add/Remove Animal</a></li>
                <li><a href="../logout/logout.php">Log out</a></li>
            </ul>
        </div>
        <div class="content-wrapper">
        <div class="register-form">
                <div class="container">
                    <div class="title profile-details-title">Add Animal</div>
                    <div>
                        <p class="error-message">
                        </p>
                    </div>
                    <div class="content">
                        <form action="" method="post" id="add-form">
                            <div class="animal-details">
                                <div class="input-box">
                                    <span class="details">Select Region</span>
                                    <select id="category" name="category" required>
                                        <option value="" disabled selected>Select Region</option>
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 3</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <span class="details">Select Habitat</span>
                                    <select id="type" name="type" required>
                                        <option value="" disabled selected>Select Habitat</option>
                                        <option value="Type 1">Type 1</option>
                                        <option value="Type 2">Type 2</option>
                                        <option value="Type 3">Type 3</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                <span class="details">Select Type</span>
                                <select id="color" name="color" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="Color 1">Color 1</option>
                                    <option value="Color 2">Color 2</option>
                                    <option value="Color 3">Color 3</option>
                                </select>
                                </div>
                                <div class="input-box">
                                <span class="details">Select Status</span>
                                <select id="size" name="size" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                </select>
                                </div>
                                <div class="second-title">Animal Details</div>

                                <div class="input-box">
                                <span class="details">Name</span>
                                <input type="text" id="name" name="name" pattern="[A-Za-z0-9.?!]+" minlength="3" maxlength="30" required>
                                </div>
                                <div class="input-box">
                                <span class="details">Scientific<br>Name</span>
                                <input type="text" id="scientific" name="scientific" pattern="[A-Za-z0-9.?!]+" minlength="3" maxlength="30" required>
                                </div>
                                <div class="input-box">
                                <span class="details">Longevity</span>
                                <input type="text" id="logenvity" name="longevity" pattern="[A-Za-z0-9.?!]+" minlength="3" maxlength="30" required>
                                </div>
                                <div class="input-box description">
                                <span class="details">Description</span>
                                <textarea id="description" name="description" pattern="[A-Za-z0-9.?!]+" minlength="10" maxlength="100" required></textarea>
                                </div>
                                <div class="input-box">
                                <span class="details">Eating<br>Habits</span>
                                <input type="text" id="eating-habits" name="eating-habits" pattern="[A-Za-z0-9.?!]+" minlength="3" maxlength="30" required>
                                </div>
                                <div class="input-box">
                                <span class="details">Related<br>Animals</span>
                                <input type="text" id="related" name="related" pattern="[A-Za-z0-9.?!]+" minlength="3" maxlength="30" required>
                                </div>   
                            </div>
                            <div class="button">
                                <input type="submit" id="add-button" value="Add" name="add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="extract-form">
            <div class="container">
            <div class="title extract">Remove Animal</div>
            <form action="" method="post" id="delete-form">
            <div class="animal-details">
                <div class="input-box">
                <span class="details">Name</span>
                <input type="text" id="name" name="name" pattern="[A-Za-z0-9.?!]+" minlength="3" maxlength="30" required>   
            </div>
            <div class="button">
                <input type="submit" id="remove-button" value="Remove" name="remove">
            </div>
        </form>
        </div>
        </div>
    </div>
    <input type="hidden" id="accountType" value="<?php echo $_SESSION['accounttype']; ?>">
</body>
</html>
