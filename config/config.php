<?php
    /* Define API key as constant. Include this file in src/functions.php */

    const  API_KEY = " live_X3nL95MER6PkRGDjLKeLy7annhBzLx1TTnOoh8Mbs85QPoQqMP0sdi7ft5MiAVVv ";
    
    $apiUrl = " https://api.thecatapi.com/v1/images/search?limit=10&api_key=x-api-key" ;
    
    /*use file_get_contents for the query*/
    $response = file_get_contents("$apiUrl");

    if($response == false){
        die("error in getting api");

    }else{
        /*json_decode to convert the response to a PHP object.*/
        $obj = json_decode($response);
    }


?>