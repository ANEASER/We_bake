
<!DOCTYPE html>
<html>
<head>

    <title>Place Order - Bakery</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <style>
</style>
</head>

<body>
        <?php
            if (isset($_SESSION["USER"]) && !isset($_SESSION["USER"]->role)) {
                include '..\app\views\customer\customernav.php';
            }    
            ?>

        <button id="cartbutton" type="button" onclick="veiwcart()"></button> 
        <section class="content" style="padding: 0%;height:100vh">
            <section class="category" style="display:flex;justify-content: flex-start;">
                        <form class="form" id="addToCartForm" method="post" action="<?php echo BASE_URL; ?>OrderControls/storeinsession">

                            <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">
                                <div class="menu-category">
                                <?php

                                    foreach ($items as $item) {
                                        echo '<div class="menu-item" style="height:310px;padding:1%">';
                                            echo '<p>' . $item->itemname . '</p>';
                                            echo '<img src="'. BASE_URL .'media/uploads/Product/'.$item->imagelink.'" alt="' . $item->itemname . '" style="height: 200px; width: 240px;margin:1%">';
                                            echo '<input type="hidden" name="items[' . $item->itemid . '][id]" value="' . $item->itemid . '">';
                                            echo '<input type="hidden" name="items[' . $item->itemid . '][code]" value="' . $item->Itemcode . '">';
                                            echo '<input type="hidden" name="items[' . $item->itemid . '][name]" value="' . $item->itemname . '">';
                                            echo '<input type="hidden" name="items[' . $item->itemid . '][price]" value="' . $item->retailprice . '">';
                                            echo '<p> Price :' . $item->retailprice.'</p>';
                                            if ($item->availability == 0) {
                                                echo '<p style="color:red">Not Available</p>';
                                            } else{
                                               
                                                echo '<input style="width: 80px; margin-left:20px" type="number" placeholder="Enter value" min="0" name="items[' . $item->itemid . '][quantity]" />';
                                                echo '<button class="bluebutton" type="submit" value="Submit">Add to Cart</button>';
                                                
                                            }
                                            
                                        echo '</div>';
                                    }
                                ?>
                                </div>
                        </form>
                </section>
                <section class="cart">
                        <?php
                            include 'Cartitems.php';
                        ?>
                        <div>
                            <button class="greenbutton" type="button" onclick="veiwcart()">checkout</button>
                            <button class="yellowbutton" onclick="edit()">edit</button>   
                        </div>
                </section>
        </section>    
    <script>
            function veiwcart() {
                window.location.href = "<?php echo BASE_URL; ?>OrderControls/viewcart";
            }

            function edit() {
                window.location.href = "<?php echo BASE_URL; ?>OrderControls/updatecart";
            }
    </script>
</body>
</html>
