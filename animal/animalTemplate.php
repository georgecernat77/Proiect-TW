<?php
require_once('../session/session.php');
require_once('../config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="animalTemplate.css">
    <link rel="stylesheet" href="../navbar/nav_bar.css">
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
    <div class="content">

    <div class ="animal-img"> <img src="../images/lion.png" alt="img">  </div>
    <div class="filter-information">
    
    <h2 class="content-title">Scientific Name</h2>
    <div class="content-description"><p>Something Lion Thing</p></div>
    
    <h2 class="content-title">Name</h2>
    <div class="content-description"><p>Lion</p></div>
    
    <h2 class="content-title">Region</h2>
    <div class="content-description"><p>Africa</p></div>
    
    <h2 class="content-title">Habitat</h2>
    <div class="content-description"><p>Savanna, Forest</p></div>
    
    <h2 class="content-title">Type</h2>
    <div class="content-description"><p>Mammal</p></div>
    
    <h2 class="content-title">Description</h2>
    <div class="description-text"><p>Once upon a time, in a small village nestled among rolling hills, there lived a curious young girl named Lily. She had an insatiable thirst for knowledge and a heart full of adventure. Every day, she would embark on exciting journeys, exploring the enchanting forests that surrounded her village. The whispering trees became her friends, and the babbling brooks revealed their secrets to her. From the tallest peaks to the deepest valleys, Lily's curiosity knew no bounds. With each new discovery, her imagination soared, painting vibrant colors on the canvas of her mind. The world was her playground, and she reveled in its mysteries, eager to unravel its hidden wonders.</p></div>
    
    <h2 class="content-title">Status</h2>
    <div class="content-description"><p>Stable</p></div>
    
    <h2 class="content-title">Longevity</h2>
    <div class="content-description"><p>Stable</p></div>
    
    <h2 class="content-title">Eating Habits</h2>
    <div class="content-description"><p>asdasdasd</p></div>
    
    <h2 class="content-title">Related Animals</h2>
    <div class="related-animals">
        <div class="animal">
            <a href="" >
            <img src="../images/bear.jpg" alt="">
            <div class="centered-link">
            <p>BEAR</p>
            </a>
            </div>
        </div>
        <div class="animal">
            <a href="" >
            <img src="../images/bear.jpg" alt="">
            <div class="centered-link">
            <p>BEAR</p>
            </a>
            </div>
        </div>
        <div class="animal">
            <a href="" >
            <img src="../images/bear.jpg" alt="">
            <div class="centered-link">
            <p>BEAR</p>
            </a>
            </div>
        </div>
        <div class="animal">
        <a href="../visitUs/visit.php">
        <img src="../images/bear.jpg" alt="">
        <div class="centered-link">
        <p>BEAR</p>
        </div>
        </a>
        </div>

    </div>
    

    </div>
    






    </div>
    </div>
    </div>
</body>
</html>
