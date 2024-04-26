<!DOCTYPE html>
<html>
<head>
    <title>Place Order - Bakery</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
</head>
<body>

    <?php
    if (isset($_SESSION["USER"]) && !isset($_SESSION["USER"]->role)) {
        include '..\app\views\customer\customernav.php';
    }    
    ?>
    
    <section>
        <div class="form-container">
            <form class="form" action="<?php echo BASE_URL; ?>OrderControls/submitorder" method="post">
                <div class="form-group">
                    <label for="orderdate">DELIVER DATE:</label>
                    <input type="date" id="orderdate" name="orderdate" required><br>
                </div>
                    
                <div class="form-group">
                    <label for="pickername">RECIEVER NAME:</label>
                    <input type="text" id="pickername" name="pickername" value="<?php echo $_SESSION['USER']->Name ; ?>" required><br>
                </div>

                <div class="form-group">
                    <label for="deliverystatus">DELIVERY / PICKUP:</label>
                    <select id="deliverystatus" name="deliverystatus" required>
                        <option value="delivery">Delivery</option>
                        <option value="pickup">Pickup</option>
                    </select><br>
                </div>

                <div class="form-group"  id="deliverAddressGroup">
                    <label for="deliver_address">DELIVER ADDRESS</label>
                    <input type="text" id="deliver_address" name="deliver_address" value="<?php echo $_SESSION['USER']->Address ; ?>" required><br>
                </div>

                <div class="form-group" id="deliverCityGroup">
                    <label for="deliver_city">DELIVER CITY:</label>
                    <select id="deliver_city" name="deliver_city">
                    <option value="Dehiwala">Dehiwala-Mount Lavinia</option>
                        <option value="Nugegoda">Nugegoda</option>
                        <option value="Rajagiriya">Rajagiriya</option>
                        <option value="Battaramulla">Battaramulla</option>
                        <option value="Kotte">Kotte</option>
                        <option value="Malabe">Malabe</option>
                        <option value="Kohuwala">Kohuwala</option>
                        <option value="Nawala">Nawala</option>
                        <option value="Pamankada">Pamankada</option>
                        <option value="Wellawatte">Wellawatte</option>
                        <option value="Bambalapitiya">Bambalapitiya</option>
                        <option value="Kirulapone">Kirulapone</option>
                        <option value="Kolonnawa">Kolonnawa</option>
                        <option value="Ethul Kotte">Ethul Kotte</option>
                        <option value="Maharagama">Maharagama</option>
                    </select>
                </div>
                <input class="bluebutton"  type="submit" value="Submit">
            </form>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            today.setDate(today.getDate() + 2); // Set to the tomorrow

            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = today.getFullYear();

            var dayAfterTomorrow = yyyy + '-' + mm + '-' + dd;
            document.getElementById('orderdate').setAttribute('min', dayAfterTomorrow);
        });

        var deliverystatus = document.getElementById('deliverystatus');
        var deliverAddressGroup = document.getElementById('deliverAddressGroup');
        var deliverCityGroup = document.getElementById('deliverCityGroup');
        var deliverAddress = document.getElementById('deliver_address');
        var deliverCity = document.getElementById('deliver_city');

       
        deliverystatus.addEventListener('change', function () {
            if (deliverystatus.value === 'delivery') {
                deliverAddressGroup.style.display = 'block';
                deliverAddress.setAttribute('required', 'true');

                deliverCityGroup.style.display = 'block';
                deliverCity.setAttribute('required', 'true');
            } else {
                deliverAddressGroup.style.display = 'none';
                deliverAddress.removeAttribute('required');

                deliverCityGroup.style.display = 'none';
                deliverCity.removeAttribute('required');
            }
        });
    </script>
</body>
</html>

