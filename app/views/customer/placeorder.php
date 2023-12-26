
<!DOCTYPE html>
<html>
<head>
    <title>Place Order - Bakery</title>
</head>
<body>
   <h1>Place Order - Bakery</h1>
    
   

   <form action="<?php echo BASE_URL; ?>CustomerControls/addtocart" method="post">

        <label for="orderdate">Order Date:</label>
        <input type="date" id="orderdate" name="orderdate" required><br>

        <label for="pickername">Picker Name:</label>
        <input type="text" id="pickername" name="pickername" required><br>

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
