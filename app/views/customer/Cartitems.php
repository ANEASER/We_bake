<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php

        echo "<table>
        <tr>
            
            <th>Code</th>
            <th>Name</th>
            <th>Quantity</th>
        </tr>";

        foreach ($cartItems as $item) {
            echo "<tr>
                    <td>{$item['code']}</td>
                    <td>{$item['name']}</td>
                    <td>{$item['quantity']}</td>
                  </tr>";  
            }

        echo "</table>";
    ?>
</body>
</html>