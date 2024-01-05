<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 3px;
        }
    </style>
</head>
<body>
    <?php
        echo "<table>
        <tr>
            
            <th>Code</th>
            <th>Name</th>
            <th>amount</th>
            <th>Subtotal</th>
        </tr>";
        $total = 0;

        foreach ($cartItems as $item) {
            echo '<tr>
                    <td>' . htmlspecialchars($item['code']) . '</td>
                    <td>' . htmlspecialchars($item['name']) . '</td>
                    <td>' . htmlspecialchars($item['quantity']) . '</td>
                    <td>' . htmlspecialchars($item['quantity'] * $item['price']) . '</td>
                </tr>';

            $total += $item['quantity'] * $item['price'];

        } 
        echo "</table>";
        echo "<br>";
        echo "total: " . $total;
        echo "<br>";
    ?>
</body>
</html>