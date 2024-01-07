<!DOCTYPE html>
<html>
<head>
    <title>Place Order - Bakery</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
</head>
<body>
    <?php
        include 'customernav.php';
    ?>
   
    <section>
        <div class="form-container">
            <form class="form" action="<?php echo BASE_URL; ?>CustomerControls/submitorder" method="post">
                <div class="form-group">
                    <label for="orderdate">DELIVER DATE:</label>
                    <input type="date" id="orderdate" name="orderdate" required><br>
                </div>
                    
                <div class="form-group">
                    <label for="pickername">RECIEVER NAME:</label>
                    <input type="text" id="pickername" name="pickername" required><br>
                </div>

                <div class="form-group">
                    <label for="deliver_address">DELIVER ADDRESS</label>
                    <input type="text" id="deliver_address" name="deliver_address" required><br>
                </div>

                <div class="form-group">
                    <label for="deliverystatus">DELIVERY / PICKUP:</label>
                    <select id="deliverystatus" name="deliverystatus" required>
                        <option value="delivery">Delivery</option>
                        <option value="pickup">Pickup</option>
                    </select><br>
                </div>
                <input class="bluebutton"  type="submit" value="SUBMIT">
            </form>
        </div>
    </section>
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
</body>
</html>

