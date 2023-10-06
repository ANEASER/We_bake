<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Customer Registration</title>
</head>
<body>
    <h2 class="header">Customer Registration Form</h2>
    <?php
        if (isset($error)){
        echo "<p style='color:red'>$error</p>";}
    ?>
    
    <form class="form-group" method="POST" action="register">
        <label for="Name">Name:</label>
        <input type="text" name="Name" required><br><br>
        
        <label for="DOB">Date of Birth:</label>
        <input type="date" name="DOB" required><br><br>
        
        <label for="contactNo">Contact Number:</label>
        <input type="text" name="contactNo" pattern="[0-9]{10,14}" required><br><br>
        
        <label for="Address">Address:</label>
        <input type="text" name="Address" required><br><br>
        
        <label for="UserName">Username:</label>
        <input type="text" name="UserName" required><br><br>
        
        <label for="Email">Email:</label>
        <input type="email" name="Email" required><br><br>

        <label for="Password">Enter Password:</label>
        <input type="password" name="Password1" required><br><br>

        <label for="Password">Enter Password Again:</label>
        <input type="password" name="Password2" required><br><br>


        <input class="button" type="submit" value="Submit">
    </form>
</body>
</html>
