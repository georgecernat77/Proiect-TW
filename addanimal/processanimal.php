<?php
$jsonData = file_get_contents('php://input');
 if ($jsonData){
    $data = json_decode($jsonData, true);
    //  Access the individual form values
    $region = $data['region'];
    $habitat = $data['habitat'];
    $type = $data['type'];
    $status = $data['status'];
    $name = $data['name'];
    $scientific = $data['scientific'];
    $longevity = $data['longevity'];
    $description = $data['description'];
    $eatingHabits = $data['eatingHabits'];
    $related = $data['related'];
    $diet = $data['diet'];
    
    //put the animal image
    
// Create the file name
$fileName = strtolower($name[0]) . '.json';
if ($status === "Stable") {
    $endangered = 0;
} else {
    $endangered = 1;
}
// Create an array with the data
$animalData = array(
    'visible' => [1],
    'name' => $name,
    'description' => $description,
    'longevity' => $longevity,
    'location' => $region,
    'diet' => $eatingHabits,
    'type' => $type,
    'scientificName' => $scientific,
    'habitat' => $habitat,
    'related' => $related,
    'endangered' => [$endangered],
    'eatingHabit' => $diet
);

// Convert the array to JSON format
$jsonData = json_encode($animalData, JSON_PRETTY_PRINT);

// Write the JSON data to the file
$file = fopen("../scraper/" . $fileName, 'w');
fwrite($file, $jsonData);
fclose($file);

// Prepare the response
$response = array(
    'status' => 'success',
    'message' => 'Animal data has been processed and saved.'
);
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
