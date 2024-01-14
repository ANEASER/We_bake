
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
        <section class="cart">
            <section class="content">
                <?php
                    include 'cartitems.php';
                ?>
            </section>
            <section class="buttongroup">
                <button class="yellowbutton" onclick="edit()">edit</button>
                <button class="greenbutton" onclick="checkout()">checkout</button>
                <button class="redbutton" onclick="cancel()">cancel</button>
                <button class="bluebutton" onclick="addmore()">addmore</button>
            </section>
        </section>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function checkout(){
            window.location.href = BASE_URL +"OrderControls/checkout";
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
                        showCancelButton: true,
                        confirmButtonText: "Delete",
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            try {
                                window.location.href = BASE_URL +"OrderControls/deletecart";
                            } catch (error) {
                                Swal.showValidationMessage(`
                                    Request failed: ${error}
                                `);
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                        })
        }

        function edit(){
            window.location.href = BASE_URL +"OrderControls/updatecart";
        }

        function addmore(){
            window.location.href = BASE_URL +"OrderControls/showcategories";
        }
    </script>
</body>
</html>
