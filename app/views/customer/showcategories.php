<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Category</title>
</head>
<body>
    <h1>Select Category</h1>
        
        <?php

            foreach ($categories as $category) {
                $categoryName = $category->category;
                echo '<button type="button" onclick="selectCategory(\'' . $categoryName . '\')">' . $categoryName . '</button>';
            }

        ?>
        <button type="button" onclick="veiwcart()">veiwcart</button>
        <button type="button" onclick="home()">Home</button>

        <script>
            function selectCategory(category) {
                window.location.href = "<?php echo BASE_URL; ?>CustomerControls/addtocart/" + category;
            }

            function veiwcart() {
                window.location.href = "<?php echo BASE_URL; ?>CustomerControls/viewcart";
            }

            function home() {
                window.location.href = "<?php echo BASE_URL; ?>CustomerControls/index";
            }
        </script>
        
</body>
</html>