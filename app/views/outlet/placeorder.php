<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outlet Manager</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/outlet/outletmanager.css">
</head>

<body>
    <?php
        include "omnavbar2.php";
    ?>
         
    <div class="content">
 <h1>Place order</h1>
        <div>
        <table>

        <tr>
                <th>Customer ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Order Placed Date</th>
                <th>Date Of Delivery Of Date</th>
            </tr>

            <tr>
                <td>011</td>
                <td>Fish Buns</td>
                <td>20</td>
                <td>2023.05.06</td>
                <td>2023.05.10</td>
            </tr>
        
        <tr>
            <td>012</td>
            <td>Tea Buns</td>
            <td>50</td>
            <td>2023.05.06</td>
            <td>2023.05.16</td>
        </tr>
        <tr>
            <td>013</td>
            <td>Cup Cakes</td>
            <td>50</td>
            <td>2023.05.06</td>
            <td>2023.05.09</td>
        </tr>
        <tr>
            <td>014</td>
            <td>Butter Cakes</td>
            <td>10 Kg</td>
            <td>2023.05.06</td>
            <td>2023.05.12</td>
        </tr>
       
        <tr>
            <td>015</td>
            <td>Breads</td>
            <td>25</td>
            <td>2023.05.06</td>
            <td>2023.05.09</td>
        </tr>
        </table>

        <li><button onclick = "PlaceOrder()">Place Order</button></li>

        </div>        
    </div>

      <script src="script.js"></script>

</body>

</html>
