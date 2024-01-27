<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title></title>
</head>
<body>
<div>
    <h1> Billing clerk Dashboard</h1>
        <ul>
            <li><button class="navbutton" onclick="loadDash()">Home</button></li>
            <li><button class="navbutton" onclick="loadProfile()">Profile</button></li>
            <li><button class="navbutton" onclick="logout()">Logout</button></li>
        </ul>
    </nav>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function logout(link) {
            window.location.href = BASE_URL + "CommonControls/logout";
        }

    </script>
</body>
</html>