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

    
    <nav>
        <input type="checkbox" id="check" name="" value="">
        <label for="check" class="checkbtn container" onclick="changemobilemode(this)">
            <div class="bar1"> <i id="sidebar_btn"></i> </div>
            <div class="bar2"> <i id="sidebar_btn"></i> </div>
            <div class="bar3"> <i id="sidebar_btn"></i> </div>
        </label>
        <?php
            echo '<img class="logo" src="' . BASE_URL . 'media/uploads/Content/logo.png" width="200px">';
        ?>
        <ul>
            <li><button onclick="loadDash()">Home</button></li>
            <li><button onclick="loadProfile()">Profile</button></li>
            <li><button onclick="PlaceOrders()">Place Orders</button></li>
            <li><button onclick="loadHistory()">Purchase History</button></li>
            <li><button onclick="logout()">Logout</button></li>
        
        </ul>
    </nav>

<script>
var BASE_URL = "<?php echo BASE_URL; ?>";

function loadDash() {
    window.location.href = BASE_URL +  "Recieptioncontrols";
}

function loadProfile() {
    window.location.href = BASE_URL +  "Recieptioncontrols/viewProfile";
}

function loadHistory() {
    window.location.href = BASE_URL +  "Recieptioncontrols/viewHistory";
}

function PlaceOrders() {
    window.location.href = BASE_URL +  "Recieptioncontrols/customernumber";
}

function logout() {
    window.location.href = BASE_URL +  "CommonControls/logout";
}

</script>

</body>
</html>
