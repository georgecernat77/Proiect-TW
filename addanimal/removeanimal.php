<?php
if (isset($_POST['name'])) {
    $nameInput = $_POST['name'];
    
    $name = strtolower($nameInput);
    
    // Set the path to the JSON file
    $jsonFilePath = '../scraper/' . $name . '.json';

    // Read the JSON file content
    $jsonData = file_get_contents($jsonFilePath);

    // Parse the JSON data into an associative array
    $animalData = json_decode($jsonData, true);

    // Modify the 'visible' attribute to [0]
    $animalData['visible'] = [0];

    // Convert the modified data back to JSON
    $updatedJsonData = json_encode($animalData, JSON_PRETTY_PRINT);

    // Write the updated JSON data back to the file
    if (file_put_contents($jsonFilePath, $updatedJsonData)) {
        // Return a success response
        $response = 'The visibility attribute was updated successfully!';
        echo $response;
    } else {
        // Failed to write updated JSON data
        echo 'Error: Failed to write updated JSON data.';
    }
} else {
    // Invalid or missing form data
    echo 'Error: Invalid form data.';
}
?>
