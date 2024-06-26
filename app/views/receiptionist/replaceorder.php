<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
   
    <title>Place order</title>
</head>
  
<body>
    <?php
        include "recnavbar.php";
    ?>
    
<br> <br>
       <div class = "form-container">
        <form class="form" action="<?php echo BASE_URL; ?>RecieptionControls/submitorder" method="post">

        <?php
        if (isset($customerfound)) {
            echo "<h3>Customer Found</h3>";
            echo "<h4>Customer Name: " . $customerfound[0]->Name . "</h4>";
            echo "<h4>Customer Email: " . $customerfound[0]->Email . "</h4>";
            echo "<h4>Customer Phone: " . $customerfound[0]->contactNo . "</h4>";
            echo '
                    <input type="hidden" id="customername" name="name" value="' . $customerfound[0]->Name . '" required><br>
                    <input type="hidden" id="customeremail" name="email" value="' . $customerfound[0]->Email . '" required><br>
                    <input type="hidden" id="customerphone" name="phone" value="' . $customerfound[0]->contactNo . '" required><br>

            <div class="form-group">
                    <label for="orderdate">Order Date:</label>
                    <input type="date" id="orderdate" name="orderdate" required><br>
            </div>

                    <label for="deliver_address">Delivery Address:</label>
                    <input type="text" id="deliver_address" name="deliver_address" required><br>
                    
                    <label for="deliverystatus">Delivery/Pickup:</label>

                    <select id="deliverystatus" name="deliverystatus" required>
                    <option value="delivery">Delivery</option>
                    <option value="pickup">Pickup</option>
                    </select><br>';

            echo "<button type='button' onclick='newcustomer()'>New Customer</button>";
        } else {
            echo '<label for="customername">Customer Name:</label>
                <input type="text" id="customername" name="name" required><br>

                <label for="customeremail">Customer Email:</label>
                <input type="email" id="customeremail" name="email" required><br>

                <label for="customerphone">Customer Phone:</label>
                <input type="tel" id="customerphone" name="phone" required><br>

                <label for="orderdate">Order Date:</label>
                <input type="date" id="orderdate" name="orderdate" required><br>

                <label for="deliver_address">Delivery Address:</label>
                <input type="text" id="deliver_address" name="deliver_address" required><br>
                
                <label for="deliverystatus">Delivery/Pickup:</label>

                <select id="deliverystatus" name="deliverystatus" required>
                <option value="delivery">Delivery</option>
                <option value="pickup">Pickup</option>
                </select><br>';
            }
            ?>
            
        <br>
        <input type="submit" value="Submit">
    </form>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function cancel(orderid){
            window.location.href = BASE_URL + "RecieptionControls/cancelOrder/" + orderid;
        }

        function more(unique_id){
            window.location.href = BASE_URL + "RecieptionControls/moredetails/" + unique_id;
        }
    </script>
    
</body>
</html>

