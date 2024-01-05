
<!DOCTYPE html>
<html>
<head>

    <title>Place Order - Bakery</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <style>
       .form{
        width: 80%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        padding: 20px;
       }

       .item{
        width: 300px;
        height: 500px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: flex-start;
        padding: 20px;
        margin: 20px;
       }

       form button{
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
       }
    </style>
</head>

<body>
        <?php
            include 'customernav.php';
        ;?>

        <button id="cartbutton" type="button" onclick="veiwcart()">cartbutton</button> 
        <section class="content">
                    <form class="form" id="addToCartForm" method="post" action="<?php echo BASE_URL; ?>CustomerControls/storeinsession">

                        <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">
                            <div class="menu-category">
                            <?php

                                foreach ($items as $item) {
                                    echo '<div class="item">';
                                        echo '<p>' . $item->itemname . '</p>';
                                        echo '<img src="'. BASE_URL .'media/uploads/Product/'.$item->imagelink.'" alt="' . $item->itemname . '" height="200px" width="300px">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][id]" value="' . $item->itemid . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][code]" value="' . $item->Itemcode . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][name]" value="' . $item->itemname . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][price]" value="' . $item->retailprice . '">';
                                        echo '<p> Price :' . $item->retailprice.'</p>';
                                        if ($item->availability == 0) {
                                            echo '<p style="color:red">Not Available</p>';
                                        } else{
                                            echo '<p style="color:rgb(78, 255, 8)"> Available </p>';
                                            echo '<p> <input type="number" placeholder="Enter value" min="0" name="items[' . $item->itemid . '][quantity]" /> </p>';
                                            echo '<button type="submit" value="Submit">Add to Cart</button>';
                                        }
                                        
                                    echo '</div>';
                                }
                            ?>
                            </div>
                    </form>
            <section class="cart">
                    <?php
                        include 'Cartitems.php';
                    ?>
                    <button type="button" onclick="veiwcart()">checkout</button>
                    <button onclick="edit()">edit</button>   
            </section>
        </section>    
    <script>
            function veiwcart() {
                window.location.href = "<?php echo BASE_URL; ?>CustomerControls/viewcart";
            }

            function edit() {
                window.location.href = "<?php echo BASE_URL; ?>CustomerControls/updatecart";
            }
    </script>
</body>
</html>
