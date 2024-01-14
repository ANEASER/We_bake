
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
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        SwalwithButton.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        }).then(() => {
                            window.location.href = BASE_URL + "OrderControls/deletecartitem/" + id;
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        SwalwithButton.fire({
                            title: "Cancelled",
                            icon: "error"
                        });
                    }
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