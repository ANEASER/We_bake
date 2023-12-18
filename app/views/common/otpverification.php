<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        if (isset($err)){
        echo "<p style='background-color:red; color:white;font-size: large; padding:1%'>$err</p>";}
    ?>
    <div>
        
        <form method="POST" action="otpvalidation" class="formisland">
            <h1>Verify Your E-Mail</h1>
            <div class="form-group">
                <label for="otp">Enter the OTP code sent to your Email</label>
                <input type="text" id="otp" name="otp" required>
                <button type="submit">confirm</button>
            </div>
        </form>

        <p>did't recieve OTP? <button onclick="resend()">Resend</button></p>
    </div>
    
    <script>
        function resend() {
            window.location.href = BASE_URL + "CommonControls/otpvalidation";
        }
    </script>

</body>
</html>
