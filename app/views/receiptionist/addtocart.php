
<!DOCTYPE html>
<html>
<head>
    <title>Place Order - Recieption</title>
</head>
<body>
   <h1>Place Order - Recieption</h1>

    <form id="addToCartForm" method="post" action="<?php echo BASE_URL; ?>RecieptionControls/storeinsession">

        <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">
        <?php
            echo '<table>';
            echo '<tr>
                <th>Price</th>
                <th>Item Description</th>
                <th>Item Name</th>
                <th>Quantity</th>
            </tr>';

            foreach ($items as $item) {
                echo '<tr>';
                echo '<input type="hidden" name="items[' . $item->itemid . '][id]" value="' . $item->itemid . '">';
                echo '<td>' . $item->retailprice . '</td>';
                echo '<td>' . $item->itemdescription . '</td>';
                echo '<td>' . $item->itemname . '</td>';
                echo '<td> <input type="number" name="items[' . $item->itemid . '][quantity]" /> </td>';
                echo '</tr>';
            }

            echo '</table>';
        ?>
        <button type="submit" value="Submit">Add to Cart</button>
    </form> 
                    
</body>
</html>
