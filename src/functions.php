<?php
    include 'config/config.php';
?>

<?php
session_start(); /* this allows you to save data in $_SESSION */
/* https://www.w3schools.com/php/php_sessions.asp */

/* write PHP functions here */
function getNames() {
    $url = "https://api.thecatapi.com/v1/breeds";  // API Endpoint
    $response = file_get_contents($url);  // Fetch data from API
    if ($response === FALSE) {
        return []; // Return an empty array if API call fails
    }
    return json_decode($response, true); // Convert JSON response to PHP array
}

if (!isset($_SESSION['breeds'])) {
    $_SESSION['breeds'] = getNames();
}

function getImages(){
    
    if (isset($_GET['breed'])) {
        $breedId = $_GET['breed'];
        $url = "https://api.thecatapi.com/v1/images/search?limit=10&breed_ids=" . $breedId;

        $response = file_get_contents($url);

        return json_decode($response, true); // Convert JSON response to PHP array

    }
    return [];
    
}

function getSelectedBreed(){
    if (isset($_GET['breed'])) {
        $selected_breed_id = $_GET['breed'];
    
        // Find the breed that matches the selected breed ID
        foreach ($_SESSION['breeds'] as $breed) {
            if ($breed['id'] == $selected_breed_id) {
                $_SESSION['selected_breed'] = $breed;  // Store the selected breed in the session
                break;
            }
        }
    }
}

function starRatings(){
 // API endpoint for the vote
    $url = "https://api.thecatapi.com/v1/votes?limit=5"; 

    // Set the headers including the Authorization Bearer token
    $headers = [
        "Authorization: Bearer live_XkcPNIPT3K7zPQcnKOFffxFD9XZiOcfsBOUy4OyqIQHCSlaMKHrCoHDqH2z2z6CW"
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check if the request was successful
    if ($response === false) {
        curl_close($ch);
        return []; // Return an empty array if the API call fails
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response to PHP array
    return json_decode($response, true);
}

if (!isset($_SESSION['stars'])) {
    $_SESSION['stars'] = starRatings();
}



if (!isset($_SESSION['selected_breed'])) {
    $selected_breed = getSelectedBreed();
    if ($selected_breed) {
        $_SESSION['selected_breed'] = $selected_breed;
    }
}

if (!isset($_SESSION['images'])) {
    $_SESSION['images'] = getImages();
}

?>