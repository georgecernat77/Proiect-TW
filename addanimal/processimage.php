<?php
if (isset($_FILES['animalImage'])) {
    $animalImageFile = $_FILES['animalImage'];

    // Get the name values
    $animalName = $_POST['animalName'];
    $animalImageName = strtolower($animalName) . '.jpg';
    $animalImageTempPath = $animalImageFile['tmp_name'];
    $animalImagePath = '../images/' . $animalImageName;
    // Move the uploaded file to the destination folder
    if (move_uploaded_file($animalImageTempPath, $animalImagePath)) {
        echo "successfully uploaded img";
    }
    else{
        echo"error in uploading img";
    }

}
?>