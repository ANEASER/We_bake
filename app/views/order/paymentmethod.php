
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>

    <style>
        button {
            min-height: 50px;
            min-width: 100px;
        }
    </style>
        <section class="cart">
            <section class="content">
                <?php
                    include 'cartitems.php';
                ?>
            </section>
            <section class="buttongroup" style="margin: 0%;padding:0%">
                <button class="greenbutton" onclick="cashondelivery()">cash on delivery</button>
                <button class="greenbutton" onclick="payonline()">pay online</button>
                <button class="redbutton" onclick="cancel()">cancel</button>
            </section>
        </section>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function cashondelivery(){
            const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "greenbutton",
                        cancelButton: "redbutton",
                    },
                    buttonsStyling: false
                });
            
            SwalwithButton.fire({
                    text: "you need to pay 30% to confirm the order before delivery. and the rest of the amount will be paid on delivery",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Proceed",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    preConfirm: async () => {
                        try {
                            await SwalwithButton.fire({
                                title: "Order Placed!",
                                text: "Your order has been placed successfully.",
                                icon: "success",
                                showConfirmButton: false, 
                                timer: 1000, 
                            }).then((result) => {
                                window.location.href = BASE_URL +"OrderControls/checkout/pending";
                            });
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
        }


        function cancel(){
            const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "redbutton",
                        cancelButton: "yellowbutton",
                    },
                    buttonsStyling: false
                });
            
            SwalwithButton.fire({
                    text: "Your whole cart will be deleted. Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Keep",
                    reverseButtons: true,
                    preConfirm: async () => {
                        try {
                            await SwalwithButton.fire({
                                title: "Deleted!",
                                text: "Your cart has been canceled.",
                                icon: "success",
                                confirmButtonText: "OK",
                                confirmButtonClass: "greenbutton"
                            });
                            window.location.href = BASE_URL +"OrderControls/deletecart";
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
        }

        function payonline(){
            Swal.fire({
                text: "You will be redirected to the payment gateway.",
                icon: "info",
                showConfirmButton: false, 
                timer: 1000, 
            }).then((result) => {
                window.location.href = BASE_URL +"OrderControls/onlinepayment";
            });
        }

        
    </script>
</body>
</html>
