<!DOCTYPE html>
<html>
<head>
    <title>Receptionist_Place Order</title>
    <link rel="stylesheet" type="text/css" href="http:\\localhost\we_bake\app\views\receptionist\receptionist.css">
</head>
<body>
    <div class="header">
        <h1>Place Your Order</h1>
    </div>
    <div class="container">

        <?php
        include "sidebar.php"
        ?>

        <div class="sub-container">
            <h2 align=center >Order Details</h2>
            <form action="customerdash.php">
                <div class="form-group">
                    <label for="item">Select Item:</label>
                    <select id="item" name="item">
                        <option value="cake">Cake</option>
                        <option value="cupcake">Cupcake</option>
                        <option value="pastry">Pastry</option>
                        <option value="bread">Bread</option>
                        <!-- Add more items as needed -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1">
                </div>

                <div class="form-group">
                    <label for="daterequired">Date Required:</label>
                    <input type="date" id="daterequired" name="daterequired">
                </div>

                <h2 align=center>Customer Details</h2>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone">
                </div>

                <input type="submit" value="Confirm Order">
            </form>
        </div>
        
        
    </div>
</body>
</html>
