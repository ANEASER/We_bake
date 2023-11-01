<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" href="http://localhost/we_bake/app/views/outlet/outletmanager.css">
</head>

<body>

<div class="header">
    </div>
    <div class="container">

        <?php
        include "omnavbar2.php"
        ?>
    
    <div class="content">
    <h1>Edit Contain Order</h1>
        <div>
        <table>
            <tr>
                <th>Customer ID </th>
                <th>Order ID</th>
                <th>Final Order Status</th>
                <th>Finalized Delivery Date</th>
                <th> Delivery Status</th>
            </tr>
        
        <tr>
            <td>121</td>
            <td>#001</td>
            <td>20 cup cakes</td>
            <td>2023.11.06</td>
            <td>Pickup</td>
        </tr>
        <tr>
            <td>122</td>
            <td>#002</td>
            <td>10 Kg Chocolate icing cakes</td>
            <td>2023.11.07</td>
            <td>Pickup</td>
        </tr>
        <tr>
            <td>123</td>
            <td>#003</td>
            <td>50 Fish buns</td>
            <td>2023.11.08</td>
            <td>Delivery</td>
        </tr>
        <tr>
            <td>124</td>
            <td>#004</td>
            <td>20 cup cakes</td>
            <td>2023.11.06</td>
            <td>Pickup</td>
        </tr>
        <tr>
            <td>125</td>
            <td>#005</td>
            <td>100 Tea buns</td>
            <td>2023.11.07</td>
            <td>Delivery</td>
        </tr>
       
        </table>

        </div>        
    </div>
    
    <script src="script.js"></script>

</body>

</html>
