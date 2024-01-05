
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
</head>
<body>
    

    <section class="cart">
        <section class="content">
        <?php

            echo "<table>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
            </tr>";

            $total = 0;

            foreach ($cartItems as $item) {
                echo "<tr>
                <td>{$item['id']}</td>
                <td>{$item['code']}</td>
                <td>{$item['quantity']}</td>
                <td>
                    <button class='yellowbutton' type='button' onclick='editCartItem({$item['id']}, {$item['quantity']})'>Edit</button>
                </td>
                <td>
                    <button class='redbutton' type='button' onclick='deletecartitem({$item['id']})'>Delete</button>
                </td>
                </tr>";
                $total += $item['quantity'] * $item['price'];

            }
            echo "</table>";
            echo "<br>";
                echo "<p style='text-align:left'>TOTAL PRICE: Rs. " . $total."</p>";
            echo "<br>";
        ?>
        </section>
        <section class="buttongroup">
            <button class="greenbutton" type="button" onclick="okButton()">OK</button>
        </section>
    </section>
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
