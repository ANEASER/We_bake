
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    

    <?php
        echo "<h3>Unique ID: " . $unique_id . "</h3>";
        echo "<h1>Cart Items</h1>";

        foreach ($cartItems as $item) {
            echo "ID: " . $item['id'] . ", Quantity: " . $item['quantity'];
            echo '<button type="button" onclick="editCartItem(' . $item['id'] . ', ' . $item['quantity'] . ')">Edit</button>';
            echo '<button type="button" onclick="deleteCartItem(' . $item['id'] . ')">Delete</button><br>';
        }
    ?>

    <button type="button" onclick="ok()"  >ok</button>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function deletecartitem(id){
            window.location.href = BASE_URL +"RecieptionControls/deletecartitem/"+id;
            console.log(id);
        }

        function editCartItem(id, quantity) {
            var newQuantity = prompt("Enter new quantity:", quantity);

            if(newQuantity == 0){
                deletecartitem(id);
            }

            if (newQuantity !== null && !isNaN(newQuantity) && newQuantity.trim() !== "") {
                window.location.href = BASE_URL + "RecieptionControls/editcartitem/" + id + "/" + newQuantity;
            }
        }

        function ok(){
            window.location.href = BASE_URL +"RecieptionControls/viewcart";
        }

    </script>
</body>
</html>
