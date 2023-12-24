<!DOCTYPE html>
<html>
<head>
    <title>Receptionist_Place Order</title>
</head>
    <body>
        <h1>Receptionist_Place Order</h1>

        <form action="<?php echo BASE_URL; ?>RecieptionControls/checkcustomer" method="post">

        <label for="customerphone">Customer Phone:</label>
        <input type="tel" id="customerphone" name="phone" required><br>

        <input type="submit" value="Submit">
    </form>
    </body>
</html>