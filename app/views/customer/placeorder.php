<!DOCTYPE html>
<html>
<head>
    <title>Place Order - Bakery</title>
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
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
</head>
<body>
    <?php
        include 'customernav.php';
    ?>
   
    <section>
        <div class="form-container">
            <form class="form" action="<?php echo BASE_URL; ?>CustomerControls/submitorder" method="post">
                <div class="form-group">
                    <label for="orderdate">Order Date:</label>
                    <input type="date" id="orderdate" name="orderdate" required><br>
                </div>
                    
                <div class="form-group">
                    <label for="pickername">Picker Name:</label>
                    <input type="text" id="pickername" name="pickername" required><br>
                </div>

                <div class="form-group">
                    <label for="deliver_address">Deliver Address</label>
                    <input type="text" id="deliver_address" name="deliver_address" required><br>
                </div>

                <div class="form-group">
                    <label for="deliverystatus">Delivery/Pickup:</label>
                    <select id="deliverystatus" name="deliverystatus" required>
                        <option value="delivery">Delivery</option>
                        <option value="pickup">Pickup</option>
                    </select><br>
                </div>
                <input class="submit"  type="submit" value="Submit">
            </form>
        </div>
    </section>
</body>
</html>

