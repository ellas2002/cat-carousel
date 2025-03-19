<?php
session_start(); // Start session at the top
include 'config/config.php';

function getNames() {
    $url = "https://api.thecatapi.com/v1/breeds";
    $response = file_get_contents($url);
    if ($response === FALSE) {
        return []; 
    }
    return json_decode($response, true);
}

if (!isset($_SESSION['breeds'])) {
    $_SESSION['breeds'] = getNames();
}

function getImages(){
    if (isset($_GET['breed'])) { // Ensure this matches form input
        $breedId = $_GET['breed'];
        $url = "https://api.thecatapi.com/v1/images/search?limit=10&breed_ids=" . $breedId;

        $response = file_get_contents($url);
        if ($response === FALSE) {
            return [];
        }

        return json_decode($response, true);
    }
    return [];
}

function getSelectedBreed(){
    if (isset($_GET['breed'])) { // Ensure this matches form input
        $selected_breed_id = $_GET['breed'];
        foreach ($_SESSION['breeds'] as $breed) {
            if ($breed['id'] == $selected_breed_id) {
                return $breed;
            }
        }
    }
    return null;
}

// Always update selected breed and images if new breed is chosen
if (isset($_GET['breed'])) {
    $_SESSION['selected_breed'] = getSelectedBreed();
    $_SESSION['images'] = getImages();
}
?>