<?php
/*
    Convert all .sigml files in the folder into JSON and compress them.
    The JSON will be loaded by the UI when the avatar plays the hello sign.
*/

// Increase execution time
set_time_limit(60);  // Adjust the timeout as needed

// Get all .sigml files in the current directory
$files = glob("*.sigml");

// Initialize the result array
$result = array();

foreach ($files as $file) {
    // Safely get file contents
    $content = file_get_contents($file);
    
    if ($content !== false) {
        // Remove unnecessary whitespace
        $output = preg_replace('/[\t\n\r]/', '', $content);
        
        // Extract the filename without extension
        $filename = pathinfo($file, PATHINFO_FILENAME);
        
        // Add the cleaned data to the result array
        $result[] = array('w' => $filename, 's' => $output);
    }
}

// Convert the result array to JSON and output it
header('Content-Type: application/json');
echo json_encode($result);
?>
