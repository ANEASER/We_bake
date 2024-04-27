<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Product Categories</title>
</head>
<body>
    <?php 
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }

        if(isset($_SESSION["USER"])){
            if($_SESSION["USER"]->Role == 'admin'){
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'adminnav.php';
            }
            else {
                include 'commonnav.php';
            }
        }
        else{
            include 'commonnav.php';
        }


        if (isset($error)){
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$error',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$error');
            }
          </script>";}
        elseif (isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '$message',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$message');
            }
          </script>";}
          unset($_SESSION['message']);
    ?>
    <section class="content">
        <section class="category" style="width: 100%;">
            <div class="menu-category">
                <?php
                    if(isset($_SESSION["USER"]) && ($_SESSION["USER"]->Role == 'admin')){
                        echo '<div class="menu-item" onclick="add()">
                                    <img src="' . BASE_URL .'media/uploads/Content/add.png" alt="ADD" style="height: 210px; width: 250px;">
                                    <div class="item-details" style="">
                                        <h3>ADD ITEM</h3>
                                    </div>
                            </div>';}
                            
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
        <script>
            var BASE_URL = "<?php echo BASE_URL; ?>";

            function add() {
                window.location.href = BASE_URL + "AdminControls/AddItem";
            }

            function selectCategory(category) {
                window.location.href = "<?php echo BASE_URL; ?>CommonControls/productitem/" + category;
            }
        </script>
</body>
</html>