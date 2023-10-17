<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="cutomersytles.css">
</head>
<body>
<div class="header">
        <h1>Our Menu</h1>
    </div>
    <div class="container">

    <?php
        include "sidebar.php"
        ?>
    
    <div class="image-container">
        <div >
            <a href="bread.php">
                <img src="customermedia\bread.avif" alt="Bread" class="image"  width="300" height="300">
                <a href="bread.php" class="button">Bread</a>
            </a>
        </div>
        <div>
        <a href="cake.php">
                <img src="customermedia\cake.jpg" alt="Cakes" class="image" width="300" height="300">
                <a href="cake.php" class="button">Cakes</a>
            </a>
        </div>
    </div>
    
    <div class="image-container">
        <div>
            <a href="bun.php">
                <img src="customermedia\bun.avif" alt="Buns" class="image"  width="300" height="300">
                <a href="bun.php"class="button" >Buns</a>
            </a>
        </div>
        <div>
            <a href="shorteat.php">
                <img src="customermedia\shorteat.avif" alt="Other Short Eats" class="image" width="300" height="300">
                <a href="shorteat.php" class="button">Other Short Eats</a>
            </a>
        </div>
    </div> 
   
</div>
</body>
</html>
