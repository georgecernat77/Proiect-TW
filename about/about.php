<?php
require_once('../session.php');
require_once('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="../nav_bar.css">
    <title>Document</title>
</head>
<body>
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
    <script src="../nav_bar.js"></script>
    <div class="visit-image">
        <img src="../images/leopard3.jpg" alt="image">
    </div>
    <div class="content">
    <div class="description">
            <h2 class="description-title">What is Zoo Web Manager?</h2>
            <div class="description-img-text">
            <img src="../images/1-tiger-png-image-download-tigers (1).png" alt="img" class="first-img">
            <h3>This website is designed to manage information related to a zoological garden.
                It provides a platform for displaying and managing data about the hosted animals, including common and scientific names, descriptions (preferably multilingual), origin, status (protected species, endangered, harmful, etc.), characteristics (such as climate dependency, dangerousness, special properties), related species, natural enemies, interesting images, dietary habits (vegetarian, carnivorous, omnivorous), breeding methods, and more.
                The site offers various search, filtering, and multi-criteria mechanisms.</h3>
            </div>
    </div>
    <div class="description">
            <h2 class="description-title">Unleash the Adventure!</h2>
            <div class="description-img-text">
            <img src="../images/animal-png-28643.png" alt="img" class="second-img">
            <h3>
            Our website, ZooWebManager, offers a captivating online experience that reflects the wonders of our zoo garden. Whether you decide to explore our main attractions, such as the Reptile House, Halls of the Depths, and the Playground, or dive into the world of our diverse animal inhabitants, which consist of nearly 200 different species, you can be assured of an endless amount of excitement and discovery.
            <br>
            Join us and embark on a virtual journey through the remarkable landscapes, fascinating creatures, and unforgettable adventures that await you in our one-of-a-kind zoo garden.
            </h3>
            </div>
    </div>
    <div class="description">
            <h2 class="description-title">Our Team</h2>
            <div class="description-img-text">
            <p>This website was designed by: </p>
            <h2>
    
                Cernat George Lucian
                <br>
                Bors Andrei Darius
                <br>
                Popa Ioana
            </h2>
            </div>
    </div>
    </div>
</body>
</html>
