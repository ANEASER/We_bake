<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Customer Found View</title>
</head>
  
<body>
    <?php
        include "recnavbar.php";
    ?>

<section>  
    <div class="form-container">

           <div>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmRLRMXynnc7D6-xfdpeaoEUeon2FaU0XtPg&usqp=CAU" style="border-radius: 80px;"  alt="propic" height="200px" width="200px">
                <div>
                    <?php
                        echo "<h1>".$customer[0]->Name."</h1>";
                    ?>
                    <h4>Is this You?</h4>
                </div>
           </div>
           <style>
                button{
                    width: 100px;
                }
           </style>
           <section class="buttongroup" style="display:flex; justify-content:center">
                <button class="greenbutton" onclick="thisisme('<?php echo $customer[0]->UserName; ?>')">Yes</button>
                <button class="yellowbutton" onclick="thisisnotme()">This Not Me</button>
           </section>
    </div>
</section>

<script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function thisisme(id){
            window.location.href = "<?php echo BASE_URL; ?>RecieptionControls/foundcustomerform/"+id;
        }//passing arguments

        function thisisnotme(){
            window.location.href = "<?php echo BASE_URL; ?>RecieptionControls/customernotfoundview";
        }
        

    </script>

</body>

</html>
