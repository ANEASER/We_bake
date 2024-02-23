<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
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