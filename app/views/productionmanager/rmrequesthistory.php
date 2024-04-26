<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Raw Materials Request History</title>
    <style>
        .hover {
            display: flex;
            padding: 8px;
        }

        .button {
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            justify-content: center;
            align-items: right;
            font-size: 16px;
            border-radius: 9px;
        }

        
        .blue {
            background-color: #3498db;
        }

        input[type=number],
        select {
            width: 20%;
            padding: 5px;
            margin: 5px;
        }

        label {
            margin-top: 5px;
            margin-left: 20px;
            width: 15%;
        }

        .bluebutton,
        .redbutton {
            margin-top: 5px;
            height: 40px;
        }

        @media screen and (max-width: 600px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <?php
    
    require('pmnavbar.php'); ?>

    <?php

    echo "<div id='RMRequestHistory' style='display:none'>";
    echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
    echo "<tr>
           <th>Request Date</th>
           <th>Order Reference</th>
           <th>Unique ID</th>
           <th>More Details</th>
       </tr>";

       
    foreach ($stockorder as $StockOrder) {
        echo "<tr>";
        echo "<td>".$StockOrder->ondate."</td>";
        echo "<td>".$StockOrder->id."</td>";
        echo "<td>".$StockOrder->unique_id."</td>";
        echo '<td><button class="button blue" onclick="more(\'' . $StockOrder->unique_id . '\')">More</button></td>';
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
    ?>
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function more(unique_id) {
            window.location.href = BASE_URL + "OrderControls/moreDetails/" + unique_id;
        }
    </script>
</body>
</html>
