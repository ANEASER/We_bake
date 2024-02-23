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
        session_start();
        if(isset($_SESSION["USER"])){
            if($_SESSION["USER"]->Role == 'admin'){
                include '..\app\views\admin\adminnav.php';
            }
            else {
                include 'commonnav.php';
            }
        }
        else{
            include 'commonnav.php';
        }
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
                                        if(isset($_SESSION["USER"])){
                                            echo '<td><button onclick="edit(' . $item->itemid . ')">Update</button></td>';
                                            echo '<td><button onclick="undo(' . $item->itemid . ')">Undo</button></td>';
                                            echo '<td><button onclick="del(' . $item->itemid . ')">Delete</button></td>';
                                        }
                                        
                                    echo '</div>';
                                }

                                if(isset($_SESSION["USER"]) && ($_SESSION["USER"]->Role == 'admin')){
                                echo '<div class="menu-item" onclick="add()">
                                            <img src="' . BASE_URL .'media/uploads/Content/add.png" alt="ADD" style="height: 210px; width: 250px;">
                                            <div class="item-details" style="">
                                                <h3>ADD ITEM</h3>
                                            </div>
                                    </div>';}
                            ?>
    </div>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";
        

        function add() {
            window.location.href = BASE_URL + "AdminControls/AddItem";
        }

        function edit(itemid) {
            window.location.href = BASE_URL + "AdminControls/EditItem/"+itemid;
        }

        function del(itemid) {
            window.location.href = BASE_URL + "AdminControls/deleteproduct/"+itemid;
        }

        function undo(itemid) {
            window.location.href = BASE_URL + "AdminControls/undoproduct/"+itemid;
        }
    </script>

</body>
</html>