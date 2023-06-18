<?php
require_once('../session/session.php');
require_once('../config/config.php');
?>

<?php
$value = $_GET['name'];
$fileName = strtolower($value);
$jsonName = $fileName . ".json"; // Concatenate value with ".json"
$directory = "../scraper"; // Directory path

// Get all files in the directory
$files = scandir($directory);

foreach ($files as $file) {
    // Check if the file name matches $jsonName
    if ($file === $jsonName) {
        // Read the content of the JSON file
        $jsonContent = file_get_contents($directory . '/' . $file);

        // Decode the JSON content into an associative array
        $animalContent = json_decode($jsonContent, true);

        // Break the loop as the file has been found
        break;
    }
}
if (!isset($animalContent)) {
    header("Location: ../animals/animals.php");
} 
// Find the image
$allowedExtensions = array('png');
$imgPath = '';

$dir = '../images/';
$files = scandir($dir);

foreach ($files as $file) {
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array($extension, $allowedExtensions) && strpos($file, $value) !== false) {
        $imgPath = $dir . $file;
        break;
    }
}
if ($imgPath === '') {
    foreach ($files as $file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension === 'jpg' && strpos($file, $value) !== false) {
            $imgPath = $dir . $file;
            break;
        }
    }
}


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
        <div class="content">
            <div class="animal-img">
                <img src="<?php echo $imgPath; ?>" alt="img">
            </div>
            <div class="filter-information">
                <h2 class="content-title">Scientific Name</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['scientificName'] as $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                        } ?></p>
                </div>

                <h2 class="content-title">Name</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['name'] as $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                        } ?></p>
                </div>

                <h2 class="content-title">Region</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['location'] as $index => $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                            if ($index < count($animalContent['location']) - 1) {
                                echo ', ';
                            }
                        } ?></p>
                </div>

                <h2 class="content-title">Habitat</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['habitat'] as $index => $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                            if ($index < count($animalContent['habitat']) - 1) {
                                echo ', ';
                            }
                        } ?></p>
                </div>

                <h2 class="content-title">Type</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['type'] as $index => $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                            if ($index < count($animalContent['type']) - 1) {
                                echo ', ';
                            }
                        } ?></p>
                </div>

                <h2 class="content-title">Description</h2>
                <div class="description-text">
                    <p><?php foreach ($animalContent['description'] as $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                        } ?></p>
                </div>

                <h2 class="content-title">Status</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['endangered'] as $content) {
                            if ($content === 0) {
                                echo "Stable";
                            } else {
                                echo "Endangered";
                            }
                        } ?></p>
                </div>

                <h2 class="content-title">Longevity</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['longevity'] as $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                        } ?></p>
                </div>

                <h2 class="content-title">Eating Habits</h2>
                <div class="content-description">
                    <p><?php foreach ($animalContent['eatingHabit'] as $content) {
                            if (ctype_lower($content[0])) {
                                $content = ucfirst($content);
                            }
                            echo $content;
                        } ?></p>
                </div>

                <h2 class="content-title">Related Animals</h2>
                <div class="related-animals">
                <?php foreach ($animalContent['related'] as $content) {
                    $imageSrc = "../images/" . $content . ".jpg";
                ?>
                <div class="animal">
                    <a href="<?php echo "../animal/animalTemplate.php?name=" . urlencode($content);?>">
                        <img src="<?php echo $imageSrc; ?>" alt="">
                        <div class="centered-link">
                            <p><?php  if (ctype_lower($content[0])) {$content = ucfirst($content);} echo $content; ?></p>
                        </div>
                    </a>
                </div>
                    <?php } ?>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>

