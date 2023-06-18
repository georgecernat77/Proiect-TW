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
    <link rel="stylesheet" href="animals.css">
    <link rel="stylesheet" href="../navbar/nav_bar.css">
    <script defer src="animals.js"></script>
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
    <div class="content-wrapper">
    <h2 class="content-title">Animals</h2>
    <div class="results">
    <div class="animal">
    <?php
    $jsonFiles = glob('../scraper/*.json'); // Get all JSON files in the "../scraper/" directory
    foreach ($jsonFiles as $jsonFile) {
        $fileName = basename($jsonFile, '.json'); // Get the file name without the ".json" extension
        $jsonData = file_get_contents($jsonFile); // Read the JSON file contents
        $animalData = json_decode($jsonData, true); // Decode the JSON data into an associative array
        if($animalData['visible'][0] === 1){
        // Get the animal name from the JSON data
        $animalName = $animalData['name'][0];
        
        // Generate the HTML code for each animal
        echo '<div class="animal">';
        echo '<div id="'.$animalName .'" class="' .$animalName .'">';
        echo '<a href="../animal/animalTemplate.php?name=' . urlencode(strtolower($animalName)) . '">';
        echo '<img src="../images/' . $animalName . '.jpg" alt="">';
        echo '<div class="centered-link">';
        echo '<p>' . $animalName . '</p>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
        }
    }
    ?>
    </div>


       </div>
        <div class="register-form">
            <div class="container">
                <!-- <div class="title profile-details-title">Search an animal</div> -->
                <div>
                    <p class="error-message">
                    </p>
                </div>
                <div class="content">
                    <form action="" method="post" id="add-form">
                        <div class="animal-details">
                            <div class="input-box">
                                <span class="details">Region</span>
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
                                <span class="details">Habitat</span>
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
                                <span class="details">Diet</span>
                                <select id="diet" name="diet" required>
                                    <option value="" disabled selected>Select Diet</option>
                                    <option value="carnivorous">Carnivorous</option>
                                    <option value="herbivorous">Herbivorous</option>
                                    <option value="omnivorous">Omnivorous</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="details">Type</span>
                                <select id="type" name="type" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="mammal">Mammal</option>
                                    <option value="reptile">Reptile</option>
                                    <option value="artropod">Artropod</option>
                                    <option value="birds">Birds</option>
                                </select>
                            </div>
                            <div class="button">
                                <input type="submit" id="filter" value="Apply Filters" name="filter">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    </div>
</body>
</html>
