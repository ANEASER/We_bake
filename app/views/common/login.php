<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Login</title>
</head>
<body>
    <?php
        if (isset($errors)) {
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
        }
    ?>
    <h1 class="header">Login</h1>
    <form class="form-group" method="POST" action="login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <button class="button" type="submit" style="margin-top: 1.5%;">Login</button>
    </form>
</body>
</html>
