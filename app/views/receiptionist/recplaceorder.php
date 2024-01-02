<!DOCTYPE html>
<html>
<head>
    <title>Receptionist_Place Order</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            today.setDate(today.getDate() + 2); // Set to the day after tomorrow

            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = today.getFullYear();

            var dayAfterTomorrow = yyyy + '-' + mm + '-' + dd;
            document.getElementById('orderdate').setAttribute('min', dayAfterTomorrow);
        });
    </script>
</head>
    <body>
        <h1>Receptionist_Place Order</h1>

        <form action="<?php echo BASE_URL; ?>RecieptionControls/submitorder" method="post">

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
            
                    <label for="orderdate">Order Date:</label>
                    <input type="date" id="orderdate" name="orderdate" required><br>
            
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
            

        <input type="submit" value="Submit">
    </form>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function newcustomer(){
            window.location.href = BASE_URL +"RecieptionControls/placeOrders";
        }
    </script>
    </body>
</html>
