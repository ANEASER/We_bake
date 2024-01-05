<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        th, td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div>
    <?php
        echo "<table>
        <tr>
            
            <th>CODE</th>
            <th>ITEM NAME</th>
            <th>AMOUNT</th>
            <th>SUBTOTAL</th>
        </tr>";
        $total = 0;

        foreach ($cartItems as $item) {
            echo '<tr>
                    <td>' . htmlspecialchars($item['code']) . '</td>
                    <td>' . htmlspecialchars(strtoupper($item['name'])) . '</td>
                    <td>' . htmlspecialchars($item['quantity']) . '</td>
                    <td>' . htmlspecialchars($item['quantity'] * $item['price']) . '</td>
                </tr>';

            $total += $item['quantity'] * $item['price'];

        } 
        echo "</table>";
        echo "<br>";
        echo "<p style='text-align:left'>TOTAL PRICE: Rs. " . $total."</p>";
        echo "<br>";
    ?>
    </div>
</body>
</html>