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

        <label for="customername">Customer Name:</label>
        <input type="text" id="customername" name="name" required><br>

        <label for="customeremail">Customer Email:</label>
        <input type="email" id="customeremail" name="email" required><br>

        <label for="customerphone">Customer Phone:</label>
        <input type="tel" id="customerphone" name="phone" required><br>

        <label for="orderdate">Order Date:</label>
        <input type="date" id="orderdate" name="orderdate" required><br>

        <label for="deliver_address">Deliver Adress</label>
        <input type="text" id="deliver_address" name="deliver_address" required><br>
        
        <label for="deliverystatus">Delivery/Pickup:</label>
        <select id="deliverystatus" name="deliverystatus" required>
        <option value="delivery">Delivery</option>
        <option value="pickup">Pickup</option>
        </select><br>

        <input type="submit" value="Submit">
    </form>
    </body>
</html>
