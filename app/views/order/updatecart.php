
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    

    <section class="cart">
        <section class="content">
        <?php

            if(!isset($_SESSION)){
                session_start();
            }

            if(isset($_SESSION["charges"])){
                $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_10;
            }else{
                $_SESSION["delivery_charge"] = 0;
            }

            echo "<table>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
            </tr>";

            $total = 0;
            $quantity = 0;

            foreach ($cartItems as $item) {
                echo "<tr>
                <td>{$item['id']}</td>
                <td>{$item['code']}</td>
                <td>{$item['quantity']}</td>
                <td>
                    <button  class='yellowbutton' type='button' onclick='editCartItem({$item['id']}, {$item['quantity']})'>Edit</button>
                </td>
                <td>
                    <button class='redbutton' type='button' onclick='deletecartitem({$item['id']})'>Delete</button>
                </td>
                </tr>";
                $total += $item['quantity'] * $item['price'];
                $quantity += $item['quantity'];

                if($quantity > 10 && $quantity <= 80 && $_SESSION["deliverstatus"] == "delivery"){
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_80;
                }
                else if($quantity > 80 && $quantity <= 300 && $_SESSION["deliverstatus"] == "delivery"){
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_300;
                }else if ($quantity > 300 && $quantity <= 1000 && $_SESSION["deliverstatus"] == "delivery"){
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_1000;
                }
                else if($quantity > 1000 && $_SESSION["deliverstatus"] == "delivery"){
                    $_SESSION["delivery_charge"] = $_SESSION["charges"]->cap_1000;
                }

            }
            echo "</table>";
            echo "<br>";
                echo "<p style='text-align:left'>CART PRICE: Rs. " . $total."</p>";
                echo "<p style='text-align:left'>DELIVERY CHARGE: Rs. " . $_SESSION["delivery_charge"]."</p>";
                echo "<p style='text-align:left'>Quantity " . $quantity."</p>";
            "<br>";
        ?>
        </section>
        <section class="buttongroup">
            <button class="greenbutton" type="button" onclick="okButton()">OK</button>
        </section>
    </section>
    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function deletecartitem(id) {
                const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "redbutton",
                        cancelButton: "yellowbutton"
                    },
                    buttonsStyling: false
                });

                SwalwithButton.fire({
                    title: "Are you sure you want to delete this item?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    preConfirm: async () => {
                        try {
                            await SwalwithButton.fire({
                                title: "Deleted!",
                                text: "Your item has been deleted.",
                                icon: "success",
                                confirmButtonText: "OK",
                                confirmButtonClass: "greenbutton"
                            });
                            window.location.href = BASE_URL + "OrderControls/deletecartitem/" + id;
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
            }



        function editCartItem(id, quantity) {
            const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "greenbutton",
                        cancelButton: "yellowbutton",
                    },
                    buttonsStyling: false
                });


            SwalwithButton.fire({
                        text: "Enter the amount of quantity you want to order:",
                        input: "number",  
                        inputAttributes: {
                            autocapitalize: "off"
                        },
                        showCancelButton: true,
                        confirmButtonText: "Done",
                        showLoaderOnConfirm: true,
                        preConfirm: async (newQuantity) => {
                            try {
                                if (newQuantity === null) {
                                    throw new Error("Quantity cannot be empty");
                                } else if (newQuantity < 0) {
                                    throw new Error("Quantity cannot be negative");
                                } else if (newQuantity == 0) {
                                    deletecartitem(id);
                                    return false; // Prevent the modal from closing
                                } else {
                                    await SwalwithButton.fire({
                                        title: "Updated!",
                                        text: "Your quantity has been updated.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        confirmButtonClass: "greenbutton"
                                    });
                                    window.location.href = BASE_URL + "OrderControls/editcartitem/" + id + "/" + newQuantity;
                                }
                            } catch (error) {
                                SwalwithButton.showValidationMessage(`
                                    Request failed: ${error}
                                `);
                                return false; // Prevent the modal from closing
                            }
                        },

                        allowOutsideClick: () => !Swal.isLoading()
                        });
        }
        
        function okButton() {
            window.location.href = BASE_URL + "OrderControls/viewcart";
        }
    </script>
</body>
</html>