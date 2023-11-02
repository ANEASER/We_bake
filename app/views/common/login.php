<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
    body {background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-large-display-of-bread-picture-image_2664293.jpg'); 
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            background-size: cover; 
            margin: 0;
            padding: 0;}
    
        .formisland {background: rgba(255, 183, 88, 0.4);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(14.3px);
                -webkit-backdrop-filter: blur(14.3px);
                border: 1px solid rgba(255, 255, 255, 0.14);
                padding: 15%;
                color:#fff;
                margin-top: 15%;
                border-radius: 15px;
            }
        

        .form-group {
            margin: 10px 0;
        }

        label,p {
            display: block;
            font-weight: bold;
            font-size: xx-large;
            text-align: center;
            color:#fff
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #D9D9D9;
        }

        button.button-home {
            background: rgb(255,211,196);
            background: linear-gradient(90deg, rgba(255,211,196,1) 0%, rgba(121,82,9,0.5663515406162465) 44%, rgba(121,82,9,0.5803571428571428) 100%);
            transition: background 0.5s;
            border: none;
            border-radius: 5px;
            height: 50px;
            font-size: 1.5rem;
            margin: 3% 15% 0% 15%;
            padding: 0% 5% 0% 5%;
            color: white ;
        }

        button.button-home:hover {
            background: rgb(255,211,196);
            color: darkgoldenrod;
            font-weight: 11000;
        } 

        .register-link {
            background: none;
            border: none;
            font-weight: bold;
            font-size: xx-large;
            color:#fff;
            text-decoration: underline; 
            cursor: pointer;
            padding: 0;
            margin: 0;
        }

</style>


<body>
    <?php
        if (isset($errors)) {
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
        }
    ?>

    <div  style="width: 50%; margin: 0% 25% 0% 25%;">
            <form method="POST" action="login" class="formisland">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button class="button-home" style="width: 400px;" type="submit">Login</button>
            </form>

            <p>Don't have account? <button  class="register-link" onclick="loadRegister()">Register</button></p>

    </div>

    <script>
        function loadRegister() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/loadRegisterView";
        }
    </script>
</body>
</html>
