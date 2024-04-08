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
            
            if(!isset($_SESSION)){
                session_start();
            }

            if(isset($_SESSION["charges"])){
                $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_10;
            }else{
                $_SESSION["delivery_charge"] = 0;
            }

            echo "<table style='margin: 0 auto;'>
            <tr>
                <th style='text-align: center;'>ITEM NAME</th>
                <th>AMOUNT</th>
                <th>SUBTOTAL</th>
            </tr>";

            $total = 0;
            $quantity = 0;
            $containercount = 0;

            foreach ($cartItems as $item) {
                echo '<tr>
                        <td style="text-align: center;">' . htmlspecialchars(strtoupper($item['name'])) . '</td>
                        <td>' . htmlspecialchars($item['quantity']) . '</td>
                        <td>' . htmlspecialchars($item['quantity'] * $item['price']) . '</td>
                    </tr>';

                $quantity += $item['quantity'];
                $total += $item['quantity'] * $item['price'];
            }

            $containercount = 0; // Reset container count for the second loop

            foreach ($cartItems as $item) {
                $containercount += ceil($item['quantity'] / $item['ipc']);

                if ($containercount > 4 && $containercount <= 20 && $_SESSION["deliverstatus"] == "delivery") {
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_80;
                } else if ($containercount > 20 && $containercount <= 50 && $_SESSION["deliverstatus"] == "delivery") {
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_300;
                } else if ($containercount > 50 && $containercount <= 100 && $_SESSION["deliverstatus"] == "delivery") {
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_1000;
                } else if ($containercount > 100 && $_SESSION["deliverstatus"] == "delivery") {
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_1000;
                }
            }

            echo "</table>";
            echo "<br>";
            echo "<p style='padding-left:2%; text-align:center'>CART PRICE: Rs. " . $total."</p>";
            echo "<p style='padding-left:2%; text-align:center'>DELIVERY CHARGE: Rs. " . $_SESSION["delivery_charge"]."</p>";
            echo "<p style='padding-left:2%; text-align:center'>Quantity : " . $quantity."</p>";
            echo "<p style='padding-left:2%; text-align:center'>No. Container : " . $containercount."</p>";
            echo "<br>";
        ?>

    </body>
</html>