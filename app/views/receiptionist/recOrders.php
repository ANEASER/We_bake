<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/receiptionist/receptionist.css">
    <title>Receptionist_Orders</title>
</head>
<body>
    <?php
        include "recnavbar.php";
    ?>
    <div class="content">
    <h1>Ongoing Customer Orders</h1>
    <table class="ongoing-orders-table">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>001</td>
                <td>Product A</td>
                <td>5</td>
                <td>In Progress</td>
                <td>2023-10-15</td>
            </tr>
            <tr>
                <td>002</td>
                <td>Product B</td>
                <td>3</td>
                <td>Shipped</td>
                <td>2023-10-20</td>
            </tr>
            <tr>
                <td>003</td>
                <td>Product C</td>
                <td>3</td>
                <td>Shipped</td>
                <td>2023-10-20</td>
            </tr>
        </tbody>
    </table>
            
    </div>
    <script src="script.js"></script>
</body>
</html>
