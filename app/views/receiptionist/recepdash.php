<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/receiptionist/receptionist.css">
    <title>Receptionist</title>
</head>
<body>
    <?php
        include "recnavbar.php";
    ?>

    <div class="content">
           
            <h1>Receptionist dashboard</h1>

            <div class="suppdash">
            <button class="formbutton">Menu</button>
            </div>

            <h1>Place Order</h1>

            <form method="POST">
            <div class="form-group">
                <label for="customerName">Customer Name:</label>
                <input type="text" id="customerName" name="name" required>
            </div> 
            <div class="form-group"> 
                <label for="customercontactnumber">Customer Contact No.:</label> 
                <input type="text" id="customercontactnumber" name="contactno" required>
            </div>
            <div class="form-group"> 
                <label for="customerAddress">Customer Address:</label> 
                <input type="text" id="customerAddresss" name="address" required>
            </div>

            <div class="form-group">
                <label for="CustomerEmail">Customer Email:</label>
                <input type="text" id="CustomerEmail" name="email" required>
            </div>

            <div class="button-container">
                <button class= "formbutton" type="submit">Save</button>
            </div>

        </form>
    
    
    </div>
   
    <script>

    </script>
</body>
</html>

