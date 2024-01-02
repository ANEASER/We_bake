
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    

    <?php
       
        echo "<h1>Cart Items</h1>";

        echo "<table>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Quantity</th>
        </tr>";

        foreach ($cartItems as $item) {
            echo "<tr>
            <td>{$item['id']}</td>
            <td>{$item['code']}</td>
            <td>{$item['quantity']}</td>
            <td>
                <button type='button' onclick='editCartItem({$item['id']}, {$item['quantity']})'>Edit</button>
                <button type='button' onclick='deletecartitem({$item['id']})'>Delete</button>
            </td>
            </tr>";
        }
    ?>

    <button type="button" onclick="okButton()">OK</button>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function deletecartitem(id){
            window.location.href = BASE_URL +"CustomerControls/deletecartitem/"+id;
        }

        function editCartItem(id, quantity) {
            var newQuantity = prompt("Enter new quantity:", quantity);

            if (newQuantity == null) {
                alert("Quantity cannot be empty");
            }

            else if(newQuantity < 0){
                alert("Quantity cannot be negative");
            }

            else if(newQuantity == 0){
                deletecartitem(id);
            }

            else if (newQuantity !== null && !isNaN(newQuantity) && newQuantity.trim() !== "") {
                window.location.href = BASE_URL + "CustomerControls/editcartitem/" + id + "/" + newQuantity;
            }

            else {
                alert("Quantity must be a number");
            }
        }

        function okButton() {
            window.location.href = BASE_URL + "CustomerControls/viewcart";
        }
    </script>
</body>
</html>

    

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function deletecartitem(id){
            window.location.href = BASE_URL +"CustomerControls/deletecartitem/"+id;
        }

        function editCartItem(id, quantity) {
            var newQuantity = prompt("Enter new quantity:", quantity);

            if (newQuantity == null) {
                alert("Quantity cannot be empty");
            }

            else if(newQuantity < 0){
                alert("Quantity cannot be negative");
            }

            else if(newQuantity == 0){
                deletecartitem(id);
            }

            else if (newQuantity !== null && !isNaN(newQuantity) && newQuantity.trim() !== "") {
                window.location.href = BASE_URL + "CustomerControls/editcartitem/" + id + "/" + newQuantity;
            }

            else {
                alert("Quantity must be a number");
            }
        }

    </script>
</body>
</html>
