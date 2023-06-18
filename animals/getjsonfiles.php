<?php
// Define the directory path
$directory = '../scraper/';

// Get all the JSON files in the directory
$files = glob($directory . '*.json');

// Extract the file names without the .json extension
$fileNames = array_map(function ($file) {
    return basename($file, '.json');
}, $files);

// Prepare the JSON response
$response = [
    'status' => 'success',
    'files' => $fileNames
];

// Set the response headers
header('Content-Type: application/json');

// Send the JSON response
echo json_encode($response);
?>
