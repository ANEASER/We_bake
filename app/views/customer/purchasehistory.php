<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
    <style>
        .homeisland {
            background: rgba(255, 183, 88, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(14.3px);
            -webkit-backdrop-filter: blur(14.3px);
            border: 1px solid rgba(255, 255, 255, 0.14);
        }
    </style>
</head>
<body style="font-family: 'Poppins', sans-serif;background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-large-display-of-bread-picture-image_2664293.jpg'); 
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            background-size: cover;">
<!--<div class="header">
        <h1 style="text-align:center;">Your Purchase History</h1>
    </div>-->
    
        <?php
        include "sidebar.php"
        ?>
    <div class="sub-container" style="width: 75%;">
    <h1 style="text-align:center; color: #BAA484; text-align:center">Your Purchase History</h1>
    </div>
    <div>
        <table class="homeisland">
        <tr>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>Date</th>
            <th>Units</th>
            <th>Price (LKR)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Croissant</td>
            <td>CR001</td>
            <td>2023-11-01</td>
            <td>30</td>
            <td>Rs. 250.00</td>
        </tr>
        <tr>
            <td>Chocolate Cake</td>
            <td>CC002</td>
            <td>2023-11-02</td>
            <td>5</td>
            <td>Rs. 2500.00</td>
        </tr>
        <tr>
            <td>Baguette</td>
            <td>BG003</td>
            <td>2023-11-03</td>
            <td>15</td>
            <td>Rs. 300.00</td>
        </tr>
        <tr>
            <td>Cupcake</td>
            <td>CP004</td>
            <td>2023-11-04</td>
            <td>12</td>
            <td>Rs. 175.00</td>
        </tr>
        <tr>
            <td>Apple Pie</td>
            <td>AP005</td>
            <td>2023-11-05</td>
            <td>7</td>
            <td>Rs. 200.00</td>
        </tr>
        </table>

        </div> 
</div>

</body>
</html>
