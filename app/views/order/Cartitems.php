<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        th, td {
            padding: 5px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

    <?php
    echo "<table style='margin: 0 auto;'>
    <tr>
        <th>ITEM NAME</th>
        <th>AMOUNT</th>
        <th>SUBTOTAL</th>
    </tr>";

    $total = 0;

    foreach ($cartItems as $item) {
        echo '<tr>
                <td>' . htmlspecialchars(strtoupper($item['name'])) . '</td>
                <td>' . htmlspecialchars($item['quantity']) . '</td>
                <td>' . htmlspecialchars($item['quantity'] * $item['price']) . '</td>
            </tr>';

        $total += $item['quantity'] * $item['price'];
    } 

    echo "</table>";
    echo "<br>";
    echo "<p style='padding-left:2%'>TOTAL PRICE: Rs. " . $total."</p>";
    echo "<br>";
?>

</body>
</html>