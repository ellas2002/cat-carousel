<?php
    session_start();
    include 'src/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <div class="container">
            <div class="row">
                <div class="col">

            <!-- code taken from carousel boot strap -->
                    <div class='carousel-wrapper'>
                        <div class="container">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php 
                                    // Check if images are set in the session
                                    if (isset($_SESSION['images']) && !empty($_SESSION['images'])):
                                        $first = true; // Flag to mark the first image as active
                                        foreach ($_SESSION['images'] as $image):
                                    ?>
                                    <!-- Carousel item for each image -->
                                    <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                                        <img src="<?= htmlspecialchars($image['url']); ?>" class="d-block w-100" alt="Cat image">
                                    </div>
                                    <?php 
                                    // Mark first image processed
                                        $first = false;
                                        endforeach;
                                        else:
                                    ?>
                    <!-- If no images are available, show a placeholder -->
                                    <div class="carousel-item active">
                                        <img src="https://via.placeholder.com/150" class="d-block w-100" alt="No image available">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                </div>
                        </div>
                    </div>
                </div>
           
        <!-- end of code taken from carousel boot strap -->
                

        <!-- descriptive section for each chosen cat -->
                
                <?php if (isset($_SESSION['selected_breed'])): 
                    $selected_breed = $_SESSION['selected_breed'];
                ?>                
                <div class="col">
                    <h3><?= htmlspecialchars($selected_breed['name']); ?></h3>
                    <p><strong>Description:</strong> <?= htmlspecialchars($selected_breed['description']); ?></p>
                    <p><strong>Origin:</strong> <?= htmlspecialchars($selected_breed['origin']); ?></p>
                    <p><strong>Temperament:</strong> <?= htmlspecialchars($selected_breed['temperament']); ?></p>
                    <p><strong>Rating:</strong> <?= htmlspecialchars($selected_breed['stars']); ?></p>
                    <div class="rating">
                        <span class="rating"> 
                            <i class="fa-solid fa-star"></i> 
                            <i class="fa-solid fa-star"></i> 
                            <i class="fa-solid fa-star"></i> 
                            <i class="fa-solid fa-star"></i> 
                            <i class="fa-regular fa-star"></i> 
                        </span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    
        
    <!-- end of descriptive section for each chosen cat -->


        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>