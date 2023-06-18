<?php
require_once('../session/session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<html>

    <head>
        <meta charset="UTF-8">
            <title>ZoM</title>
            <link rel="stylesheet" href="pagina_open.css">
            <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

 
<div class="content">

<div class="special">
        <img src="..\images\zoo.png" class="special_image"></img>
      </div>

    <div>


            <h1>
                Hello! 
            </h1>

            <h2>
                Welcome to Zoo Web!
            </h2>

            <h3>Are you ready to discover our world?</h3>

            <h4>
                Our zoo is the perfect place to spend time with your family. 
            </h4>

            <h5>

            <a href="../pagina_sign_in/SignIn.html" class="button">Get started!</a>

            </h5>

    </div>

</div>
   
    
    </body>


    

</html>