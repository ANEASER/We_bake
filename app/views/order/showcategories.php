<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <title>Select Category</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>

    <button id="cartbutton" type="button" onclick="veiwcart()"></button> 

    <section class="content">
        
        <section class="category">
            <div class="menu-category">
                <?php

                    foreach ($categories as $category) {
                        $categoryName = $category->category;
                        echo '<div class="menu-item" onclick="selectCategory(\'' . $categoryName . '\')">
                                <img src="' . BASE_URL .'media/uploads/Content/'. $categoryName . '.jpg" alt="<?php echo $categoryName ?>" style="height: 210px; width: 250px;">
                                <div class="item-details" style="">
                                    <h3>' .strtoupper($categoryName). '</h3>
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
                <div>
                    <button class="greenbutton" type="button" onclick="veiwcart()">checkout</button>
                    <button class="yellowbutton" onclick="edit()">edit</button>      
                </div>
        </section>
    
    </section>
        <script>
            function selectCategory(category) {
                window.location.href = "<?php echo BASE_URL; ?>OrderControls/addtocart/" + category;
            }

            function veiwcart() {
                window.location.href = "<?php echo BASE_URL; ?>OrderControls/viewcart";
            }

            function edit() {
                window.location.href = "<?php echo BASE_URL; ?>OrderControls/updatecart";
            }

        </script>
        
</body>
</html>