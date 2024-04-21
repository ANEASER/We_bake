
<!DOCTYPE html>
<html>
<head>
    <title>Secure pay</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f7f6;
        }
        
        section {
            text-align: center;
            background-color: white;
            border-radius: 10px;
            width: 500px;
            height: 300px;
        }
        
        .payment-form {
            display: inline-block;
            text-align: left;
        }
        
        .payment-form label {
            display: block;
            margin: 5% 8% 0% 2%;
        }
        

        input {
            width: 93%;
            padding: 8px;
            margin: 5% 2% 5% 2%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .buttongroup {
            margin-top: 20px;
        }

    </style>

    <section style="border: solid 1px #ccc;">
        <h1>Total Amount : <?php echo $total ?></h1>
        <section class="payment-form">
            <form id="paymentForm">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXX" required>
                <div style="display: flex; flex-direction:row;justify-content:space-between">
                    <div style="margin-left: 2%; width:230px">
                        <label for="securityNumber">Security Number:</label>
                        <input type="text" id="securityNumber" name="securityNumber" placeholder="CVV" required>
                    </div>
                    <div style="margin-right: 3%; width:230px">
                        <label for="expiryDate">Expiry Date:</label>
                        <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required><br>
                    </div>
                </div>
                
            </form>
            <br>
            <div style="display: flex; flex-direction:row;justify-content:center">
                <button class="bluebutton" onclick="pay(<?php echo $total ?>)">PAY</button>
                <button class="yellowbutton" onclick="cancel()">Cancel</button>
            </div>
            
        </section>
    </section>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function pay(amount){
            Swal.fire({
                title: "Payment Successed!",
                text: "Your order has been placed successfully.",
                icon: "success",
                showConfirmButton: false, 
                timer: 1000, 
            }).then((result) => {
                window.location.href = BASE_URL +"OrderControls/checkout/paid/"+ amount ;
            });
        }

        function cancel(){
            console.log("cancel");
            window.location.href = BASE_URL +"OrderControls/paymentgateway";
        }
    </script>
</body>
</html>
