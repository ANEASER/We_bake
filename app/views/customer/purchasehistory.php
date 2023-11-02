<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body style="font-family: 'Poppins', sans-serif;">
<!--<div class="header">
        <h1 style="text-align:center;">Your Purchase History</h1>
    </div>-->
    <div class="container">

        <?php
        include "sidebar.php"
        ?>
    <div class="sub-container">
    <h1 style="text-align:center;">Your Purchase History</h1>
    </div>
    <div>
        <table>
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
