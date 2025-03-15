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

?>