<!DOCTYPE html>
<html>
<head>
    <title>Receptionist_Place Order</title>
</head>
    <body>
        <h1>Receptionist_Place Order</h1>

        <form action="<?php echo BASE_URL; ?>RecieptionControls/addtocart" method="post">

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
