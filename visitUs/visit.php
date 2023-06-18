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
    <link rel="stylesheet" href="visit.css">
    <link rel="stylesheet" href="../navbar/nav_bar.css">
    <script defer src="./visit.js"></script>
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
    <div class="visit-image">
        <img src="visitimage.png" alt="image">
    </div>
    <h1 class="main-title">Discover Our Attractions</h1>
    <div class="main">
    <div class="container">
    <div class="title book-appointment-title">When would you like to visit us?</div>
    <form action="" method="post" id="appointment-form">
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <select id="time" name="time" required>
                <option value="" disabled selected>Select Time</option>
                <option value="09:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="12:00">12:00 PM</option>
                <option value="13:00">01:00 PM</option>
                <option value="14:00">02:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="16:00">04:00 PM</option>
                <option value="17:00">05:00 PM</option>
            </select>
        </div>
        
        
        <div class="form-group">
            <label for="place">Place:</label>
            <select id="place" name="place" required>
                <option value="" disabled selected>Select Place</option>
                <option value="Halls Of The Depths">Halls Of The Depths</option>
                <option value="Reptile House">Reptile House</option>
                <option value="Playground">Playground</option>
            </select>
        </div>

        <input type="submit" value="Book Appointment">
    </form>
        <div>
            <p class="error-message">
            </p>
        </div>
    </div>
   
    <div class="description">
            <h2 class="description-title">A New Adventure Awaits!</h2>
            <div class="description-img-text">
            <img src="leu-visit.png" alt="img">
            <p class="description-text">
            Our zoo garden is the perfect place where you can find animals that you've never seen before and create new experiences.
            You can book your visit from this page if you choose to spend some time by visting our main attractions, including Reptile House, Halls of the Depths and the Playground.
            </p>
            </div>
    </div>
</div>
</body>
</html>
