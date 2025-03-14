<?php
    /* Define API key as constant. Include this file in src/functions.php */

    const  API_KEY = "live_XkcPNIPT3K7zPQcnKOFffxFD9XZiOcfsBOUy4OyqIQHCSlaMKHrCoHDqH2z2z6CW ";
    
    $url = "https://api.thecatapi.com/v1/images/search?limit=100&api_key=" . API_KEY ;
    
    /*use file_get_contents for the query*/
    $response = file_get_contents("$url");

    if($response == false){
        die("error in getting api");

    }else{
        /*json_decode to convert the response to a PHP object.*/
        $obj = json_decode($response);
    }

?>