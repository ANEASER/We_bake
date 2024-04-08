<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/userprofile.css">
    <title>Store Manager_Profile</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    <div class="profile-container">
        <div class="profile-picture">
            <img src="<?php echo BASE_URL ?>media/uploads/Content/user.png" alt="Profile Picture">
        </div>
        <div class="profile-details">
            <h2>User Profile</h2>
            <p><strong>Name:</strong> John Doe</p>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Phone:</strong> 123-456-7890</p>
            <p><strong>Address:</strong> 123 Main Street, City, Country</p>
        </div>
    </div>

    
    
</body>
</html>
