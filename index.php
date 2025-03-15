<?php
    include 'src/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cat Carousel</title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
   rel="stylesheet" crossorigin="anonymous"
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Cat Carousel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
        
        <!--fetches names of cats -->
        <script>
            fetch("https://api.thecatapi.com/v1/breeds")
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById("cat-breed-select")
                select.innerHTML = ""

                data.forEach(breed =>{
                    let option = document.createElement("option")
                    option.value = breed.id;
                    option.innerHTML = breed.name;
                    select.appendChild(option);
                })
            })
            .catch(error => console.error("error fetching cat breeds:", error))
        </script>
        
        
        <!--bootstrap grid set up and population -->
        <form method="get" action="carousel.php">
            <label for="cat-breed-select">Choose a breed:</label>
            <select id ="cat-breed-select" name="breed">

                <option value="">loading...</option>
    
            </select>
            <input type="submit" value="see cats">



        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>