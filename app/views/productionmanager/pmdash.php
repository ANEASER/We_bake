<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/navbar.css">
    <style>
    nav{
                align-items: center;
    height: 100%;
    width: 100%;
    
    top: 0px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}


nav ol{
    
    margin-right: 10%;
    margin-left: 10%;
}

nav ol li{
    display: column;
    
    line-height: 80px;
    margin: 0 5px;
    cursor: pointer;
}

nav ol li a{
    color: rgb(95, 37, 37);
    
    padding: 7px 13px;
    border-radius: 3px;
    text-transform: uppercase;
    font-family: poppins;
}

a.active,a:hover{
    border-radius: 10px;
    background: #351a07;
    transition: .5s;
    color: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
}


.column1{
  margin-top: 50%;
   margin-bottom: 50%;
}   
.row{
    
    display: grid;
    grid-template-columns: 50% 50%;
    grid-gap: 10px;
    background-color: white;
    
}

</style>
</head>

<body>
<div class="row">
<div class="column1" style="background-color:white;">
    <div>
        <?php 
        echo '<img src="' . BASE_URL . 'media/uploads/Content/bg1.jpg" alt="logo" style="margin-left:auto; margin-right:auto; display:block; width:50%; height:100%; transform:scale(2);">'
        ?>
    </div>
</div>
<div class="column" style="background-color:antiquewhite;">
    
    <nav align="center" style="padding-top:30%;font-size:20px; ">
    <h1 style="color:rgb(95,37,37); padding-bottom: 40px;"> Production Manager</h1>
        <ol>
        <li><a class="navbutton" onclick="pendingOrders()">Production Orders</a></li>
        <li><a class="navbutton" onclick="rm()">Raw Materials Requests</a></li>
        <li><a class="navbutton" onclick="loadVehicles()">Vehicles</a></li>
        <li><a class="navbutton" onclick="logout()">Log Out</a></li>
        </ol>
        </nav>
    </div>
</div>

<script>
       var BASE_URL = "<?php echo BASE_URL; ?>";

        function pendingOrders() {
            window.location.href = BASE_URL + "pmcontrols/pendingOrdersView";
        }
        function rm() {
            window.location.href = BASE_URL + "pmcontrols/rmView";
        }
        function loadVehicles() {
            window.location.href = BASE_URL +  "pmcontrols/loadVehiclesView";
        }
        function logout() {
            window.location.href = BASE_URL + "CommonControls/logout";
        }

    </script>
</body>
</html>
