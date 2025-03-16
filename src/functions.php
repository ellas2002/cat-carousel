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

if (!isset($_SESSION['images'])) {
    $_SESSION['images'] = getImages();
    var_dump($images);
}

?>