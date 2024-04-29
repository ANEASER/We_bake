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
   
    <title> Customer NotFound </title>
</head>
  
<body>
    <?php
        include "recnavbar.php";
    ?>

 
<section>
 <div class="form-container">

<form class="form" method="POST" action="<?php echo BASE_URL; ?>RecieptionControls/submitorder" class="formisland">
    <div class="form-group">
    <h1> <b><span style="color:red;">Customer Not Found</span></b> </h1>

        <label for="customername">Customer Name:</label>
        <input type="Text" id="customername" name="customername" required>

        <label for="customeremail">Customer Email:</label>
        <input type="Text" id="customeremail" name="customeremail" required>
 
        <label for="customerphonenumber">Customer Phone Number :</label>
        <input type="Text" id="customerphonenumber" name="customerphonenumber" required>

        <label for="orderdate">Order date :</label>
        <input type="date" id="orderdate" name="orderdate" min="<?php echo date('Y-m-d', strtotime('+2 day')); ?>" required>

        <label for="deliveryaddress">Delivery Address</label>
        <input type="Text" id="deliveryaddress" name="deliveryaddress" required>

        <label for="delivery/Pickup">Delivery/Pickup:</label>
        <input type="Text" id="delivery/Pickup" name="delivery/Pickup" required>

        <label for="picker">picker</label>
        <input type="text" id="picker" name="picker" required>


    </div>
    <button class="greenbutton">Submit</button>
</form>

</div>
</section>

<script>
       
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
