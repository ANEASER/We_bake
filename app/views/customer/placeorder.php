
<!DOCTYPE html>
<html>
<head>
    <title>Place Order - Bakery</title>
</head>
<body>
   <h1>Place Order - Bakery</h1>
    
   <button onclick="addtocart()">Add to cart Items</button>

   <script>

         var BASE_URL = "<?php echo BASE_URL; ?>";
         
         function addtocart(){
                window.location.href = BASE_URL +"CustomerControls/addtocart";
         }
         
   </script>

</body>
</html>
