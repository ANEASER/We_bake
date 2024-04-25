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
                                if(isset($_SESSION["USER"]) && ($_SESSION["USER"]->Role == 'admin')){
                                    echo '<div class="menu-item" style="height: 330px;" onclick="add()">
                                                <img src="' . BASE_URL .'media/uploads/Content/add.png" alt="ADD" style="height: 250px; width: 250px;">
                                                <div class="item-details" style="">
                                                    <h3>ADD ITEM</h3>
                                                </div>
                                        </div>';}
                                        
                                foreach ($items as $item) {
                                    if(isset($_SESSION["USER"]->Role) && $_SESSION["USER"]->Role == 'admin'){
                                        echo '<div class="menu-item" style="height: 330px;">';
                                    }else {
                                        echo '<div class="menu-item">';
                                    }
                                        echo '<p>' . $item->itemname . '</p>';
                                        echo '<img src="'. BASE_URL .'media/uploads/Product/'.$item->imagelink.'" alt="' . $item->itemname . '" style="height: 210px; width: 250px;">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][id]" value="' . $item->itemid . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][code]" value="' . $item->Itemcode . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][name]" value="' . $item->itemname . '">';
                                        echo '<input type="hidden" name="items[' . $item->itemid . '][price]" value="' . $item->retailprice . '">';
                                        echo '<p style="text-align:center"> Price :' . $item->retailprice.'</p>';
                                        if ($item->availability == 0) {
                                            echo '<p style="color:red;text-align:center">Not Available</p>';
                                        } else{
                                            echo '<p style="color:rgb(78, 255, 8);text-align:center"> Available </p>';
                                        }
                                        if($_SESSION["USER"]->Role == 'admin'){
                                            echo '<div style="display:flex;flex-direction:row;justify-content:center">';
                                                echo '<button style="width: 80px;" onclick="edit(' . $item->itemid . ')">Update</button>';
                                            echo '</div>';
                                        }
                                        
                                    echo '</div>';
                                }

                                
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
        
    </script>

</body>
</html>