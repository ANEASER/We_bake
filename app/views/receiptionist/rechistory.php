<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/receiptionist/receptionist.css">
    <title>Receptionist_Purchase History</title>
</head>
<body>
    <?php
        include "recnavbar.php";
    ?>
    <div class="content">
        <h1>Customer purchase History</h1>

        <table class="purchase-history-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2023-10-01</td>
                <td>Product A</td>
                <td>$25.99</td>
            </tr>
            <tr>
                <td>2023-09-15</td>
                <td>Product B</td>
                <td>$19.99</td>
            </tr>
            <tr>
                <td>2023-09-15</td>
                <td>Product C</td>
                <td>$19.99</td>
            </tr>
        </tbody>
    </table>
            
    </div>
    <script src="script.js"></script>
</body>
</html>
