<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .search-bar {
            margin-top: 20px;
        }

        h2 {
            font-size: 24px; 
        }
        
    </style>
    <title>Page not found</title>
</head>
<body>
    <div class="container">
        <?php
            echo '<img class="logo" src="' . BASE_URL . 'media/uploads/Content/logo.png" width="200px">';
        ?>
        <h2>Internal Server Error</h2>
        <p>Sorry, the server encountered an error.</p>
        <p>We are working to fix this issue.</p>
        <p>Please try again later.</p>
        <div>
            <span onclick="navigateTo('<?php echo BASE_URL; ?>')">Home</span> | <span onclick="navigateTo('/contact')">Contact Us</span> | <span onclick="navigateTo('/about')">About Us</span>
        </div>

    </div>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function navigateTo(url) {
            console.log(url);
            window.location.href = url;
        }
    </script>
</body>
</html>
