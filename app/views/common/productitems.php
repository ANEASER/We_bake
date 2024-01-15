<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Product Categories</title>
</head>
<body>
    <?php 
        include 'commonnav.php';
    ?>
    
    <div class="menu-category">
                            <?php

                                foreach ($items as $item) {
                                    echo '<div class="menu-item">';
                                        echo '<p>' . $item->itemname . '</p>';
                                        echo '<img src="'. BASE_URL .'media/uploads/Product/'.$item->imagelink.'" alt="' . $item->itemname . '" style="height: 210px; width: 250px;">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][id]" value="' . $item->itemid . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][code]" value="' . $item->Itemcode . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][name]" value="' . $item->itemname . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][price]" value="' . $item->retailprice . '">';
                                        echo '<p> Price :' . $item->retailprice.'</p>';
                                        if ($item->availability == 0) {
                                            echo '<p style="color:red">Not Available</p>';
                                        } else{
                                            echo '<p style="color:rgb(78, 255, 8)"> Available </p>';
                                        }
                                        
                                    echo '</div>';
                                }
                            ?>
    </div>

</body>
</html>