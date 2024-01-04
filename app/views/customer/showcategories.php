<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
    <title>Select Category</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>

    <button id="cartbutton" type="button" onclick="veiwcart()">cartbutton</button> 

    <section class="content">
        
        <section class="category">
            <div class="menu-category">
                <?php

                    foreach ($categories as $category) {
                        $categoryName = $category->category;
                        echo '<div class="menu-item" onclick="selectCategory(\'' . $categoryName . '\')">
                                <img src="' . $categoryName . '.png" alt="' . $categoryName . '">
                                <div class="item-details">
                                    <h3>' . $categoryName . '</h3>
                                </div>
                            </div>';
                    }

                ?>
            </div>
        </section>
        <section class="cart">
                <?php
                    include 'cartitems.php';
                ?>
                <button type="button" onclick="veiwcart()">veiwcart</button>       
        </section>
    
    </section>
        <script>
            function selectCategory(category) {
                window.location.href = "<?php echo BASE_URL; ?>CustomerControls/addtocart/" + category;
            }

            function veiwcart() {
                window.location.href = "<?php echo BASE_URL; ?>CustomerControls/viewcart";
            }

        </script>
        
</body>
</html>