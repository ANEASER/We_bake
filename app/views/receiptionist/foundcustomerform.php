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

    <title> Customer Found </title>

</head>
  
<body>
    <?php
        include "recnavbar.php";
    ?>

<section>
 <div class="form-container">

<form class="form" method="POST" action="<?php echo BASE_URL; ?>RecieptionControls/submitorder" class="formisland">
    <div class="form-group">
    <h1> <b><span style="color:green;">Customer Found</span></b> </h1> <br>


<h4> Customer username: <?php echo $foundcustomer->UserName ?> </h4>
<h4> Customer Email: <?php echo $foundcustomer->Email?> </h4>
<h4> Customer Telephone Number: <?php echo $foundcustomer->contactNo ?>  </h4> <br>


        <input type="hidden" id="customername" name="customername"  value="<?php echo $foundcustomer->Name ?>" required>
        <input type="hidden" id="customeremail" name="customeremail"  value="<?php echo $foundcustomer->Email ?>"  required>
        <input type="hidden" id="customerphonenumber" name="customerphonenumber"  value="<?php echo $foundcustomer->contactNo ?>"  required>


        <label for="orderdate">Order date :</label>
        <input type="date" id="orderdate" name="orderdate" min="<?php echo date('Y-m-d', strtotime('+2 day')); ?>" required>
        

        <label for="deliveryaddress">Delivery Address :</label>
        <input type="text" id="deliveryaddress" name="deliveryaddress" required>


        <div class="form-group">
                            <label for="deliverystatus">Delivery / Pickup </label>
                            <select id="deliverystatus" name="deliverystatus" required>
                                <option value="delivery">Delivery</option>
                                <option value="pickup">Pickup</option>
                            </select><br>
                        </div>

        
        <label for="picker">Order picker :</label>
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