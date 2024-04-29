<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
   
    <title>Customer Number Search</title>

</head>
  
<body>
    <?php
        include "recnavbar.php";
    ?>

 <section>
 <div class="form-container">

 <form class="form" id="orderForm" method="POST" action="<?php echo BASE_URL; ?>RecieptionControls/customernumbersearch" class="formisland">
    <div class="form-group">
        <h1>Place Order</h1>
        <label for="telephoneno">Telephone No:</label>
        <input type="text" id="telephoneno" name="telephoneno" required>
        <span id="error-message" style="color: red;"></span>
    </div>
    <button type="submit" class="greenbutton">Submit</button>
</form>

</div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('orderForm');
        form.addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    });

    function validateForm() {
        var phoneNumber = document.getElementById("telephoneno").value;
        var errorMessage = document.getElementById("error-message");

        if (phoneNumber.length < 10) {
            errorMessage.textContent = "Please enter a valid contact number";
            return false;
        }
        return true;
    }
</script>
</body>
</html>

