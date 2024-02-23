<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
</head>
<body>
    <h2>Customer Registration Form</h2>
    <?php
        if (isset($error)){
        echo "<p style='background-color:red; color:white;font-size: large; padding:1%'>$error</p>";}
    ?>

    <div>
        
        <div>
            <form method="POST" action="register">

                <label for="Name">Name:</label>
                <input type="text" name="Name" required>

                <label for="DOB">Date of Birth:</label>
                <input type="date" name="DOB" required>
      
                <label for="contactNo">Contact Number:</label>
                <input type="text" name="contactNo" pattern="[0-9]{10,14}" required>

                <label for="Address">Address:</label>
                <input type="text" name="Address" required>

                <label for="UserName">Username:</label>
                <input type="text" name="UserName" required>

                <label for="Email">Email:</label>
                <input type="email" name="Email" required>

                <label for="Password">Enter Password:</label>
                <input type="password" name="Password1" required>

                <label for="Password">Enter Password Again:</label>
                <input type="password" name="Password2" required>

                <button class="button-home" style="width: 200px;" type="submit">Register</button>
            </form>

            <p>Already have account? <button onclick="loadLogin()">Login</button></p>
        </div>
        
    </div>


    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function loadLogin() {
            window.location.href = BASE_URL + "CommonControls/loadLoginView";
        }
    </script>
</body>
</html>
