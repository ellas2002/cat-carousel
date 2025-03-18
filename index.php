<?php
    session_start();
    include 'src/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/style.css" rel="stylesheet">
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
        <h1>Cat Carousel</h1>
        <h4>Select a cat breed</h4>


        <!--bootstrap grid set up and population -->
        <form method="GET" action="carousel.php">
            <select id ="cat-breed-select" name="breed">
                <?php forEach ($_SESSION['breeds'] as $breeds): ?>
                    <option value="<?= htmlspecialchars($breeds['id']); ?>"
                        <?= (isset($_GET['breed']) && $_GET['breed'] == $breeds['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($breeds['name']); ?>
                    </option>
                <?php endforeach; ?> 

            </select>
            <input type="submit" value="see cats" class="cat_btn">
        </form>


        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>