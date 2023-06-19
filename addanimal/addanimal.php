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
    <script defer src="addanimal.js"></script>
    <script defer src="removeanimal.js"></script>
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
                    <div class="content">
                    <form action="" method="post" id="add-form">
                    <div class="animal-details">
                        <div class="input-box">
                            <span class="details">Select Region</span>
                            <select id="region" name="region" required>
                                <option value="" disabled selected>Select Region</option>
                                <option value="europe">Europe</option>
                                <option value="united states">United States</option>
                                <option value="asia">Asia</option>
                                <option value="south america">South America</option>
                                <option value="arctic ocean">Arctic Ocean</option>
                                <option value="africa">Africa</option>
                                <option value="australia">Australia</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Select Habitat</span>
                            <select id="habitat" name="habitat" required>
                                <option value="" disabled selected>Select Habitat</option>
                                <option value="savanna">Savanna</option>
                                <option value="grassland">Grassland</option>
                                <option value="forest">Forest</option>
                                <option value="river">River</option>
                                <option value="ocean">Ocean</option>
                                <option value="sea">Sea</option>
                                <option value="soil">Soil</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Select Diet</span>
                            <select id="diet" name="diet" required>
                                <option value="" disabled selected>Select Diet</option>
                                <option value="carnivorous">Carnivorous</option>
                                <option value="herbivorous">Herbivorous</option>
                                <option value="omnivorous">Omnivorous</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Select Type</span>
                            <select id="type" name="type" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="mammal">Mammal</option>
                                <option value="reptile">Reptile</option>
                                <option value="artropod">Artropod</option>
                                <option value="birds">Birds</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Select Status</span>
                            <select id="status" name="status" required>
                                <option value="" disabled selected>Select Status</option>
                                <option value="stable">Stable</option>
                                <option value="endangered">Endangered</option>
                            </select>
                        </div>
                        <div class="second-title">Animal Details</div>

                        <div class="input-box">
                            <span class="details">Name</span>
                            <input type="text" id="name" name="name" pattern="[A-Za-z]+" minlength="3" maxlength="30" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Scientific<br>Name</span>
                            <input type="text" id="scientific" name="scientific" pattern="[A-Za-z ]+" minlength="3" maxlength="30" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Animal Image</span>
                            <input type="file" id="animal-image" name="animal-image" accept="image/*" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Longevity</span>
                            <input type="text" id="logenvity" name="longevity" pattern="[A-Za-z0-9.?! ]+" minlength="3" maxlength="30" required>
                        </div>
                        <div class="input-box description">
                            <span class="details">Description</span>
                            <textarea id="description" name="description" pattern="[A-Za-z0-9.?!]+" minlength="10" maxlength="100" required></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Eating<br>Habits</span>
                            <input type="text" id="eating-habits" name="eating-habits" pattern="[A-Za-z,]+" minlength="3" maxlength="30" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Related<br>Animals</span>
                            <input type="text" id="related" name="related" pattern="[A-Za-z, ]+" minlength="3" maxlength="30" required>
                        </div>
                        
                    </div>
                    <div class="button">
                        <input type="submit" id="add-button" value="Add" name="add">
                    </div>
                </form>

                        <div>
                        <p class="error-message">
                        </p>
                        </div>
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
                <input type="text" id="extract-name" name="extract-name" pattern="[A-Za-z]+" minlength="3" maxlength="30" required>   
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
