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
    <title>Place Order</title>
</head>
<body>
      
       <?php
        include "omnavbar2.php";
    ?>
        <section>
    
            <div class = "form-container">
                    <form class="form" action="<?php echo BASE_URL; ?>OutletControls/submitorder" method="post">
                    <div class="form-group">
                        <label for="orderdate"><br>Order Date:</label>
                        <input type="date" id="orderdate"  min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" name="orderdate" required><br>
                    </div>
    
                    <input  class="bluebutton" type="submit" value="Submit">
                </form>
            </div>

        </section>


     <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function dashboard(){
            window.location.href = BASE_URL + "outletControls/index";
        }

        function more(unique_id){
            window.location.href = BASE_URL + "outletControls/moredetails/" + unique_id;
        }
     </script>
</body>
</html>