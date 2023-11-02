<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
    <style>
    body {background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-large-display-of-bread-picture-image_2664293.jpg'); 
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            background-size: cover; 
            margin: 0;
            padding: 0;}
    
        .formisland {background: rgba(255, 255, 255, 0.4);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(14.3px);
                -webkit-backdrop-filter: blur(14.3px);
                border: 1px solid rgba(255, 255, 255, 0.14);
                padding:  5% 20% 5% 20%;
                color:#fff;
                border-radius: 15px;
            }
        

        label,p {
            display: block;
            font-weight: bold;
            font-size: large;
            text-align: center;
            color:#fff;
            margin-bottom:1%;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="email"] {
            width: 100%;
            height: 80%;
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
            height: 30px;
            font-size: 1em;
            margin: 3% 15% 0% 25%;
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
            font-size: large;
            color:#fff;
            text-decoration: underline; 
            cursor: pointer;
            padding: 0;
            margin: 0;
        }

</style>
</head>
<body>
    <h2 class="header">Customer Registration Form</h2>
    <?php
        if (isset($error)){
        echo "<p style='color:red'>$error</p>";}
    ?>

    <div style="display: flex; flex-direction:row">
        <div style="width: 50%;padding:7% 0 0 10%">
            <img src="http://localhost\we_bake\app\views\customer\customermedia\logo.png" style="border-radius: 50%; margin:0 0 0 0" alt="WE BAKE Logo" width="50%" >
        </div>
    
        <div style="width: 50%">
            <form class="formisland" style="margin-right: 3%;" method="POST" action="register">

                <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" name="Name" required>
                </div>
                <div class="form-group">
                <label for="DOB">Date of Birth:</label>
                <input type="date" name="DOB" required>
                </div>
                <div class="form-group">
                <label for="contactNo">Contact Number:</label>
                <input type="text" name="contactNo" pattern="[0-9]{10,14}" required>
                </div>
                <div class="form-group">
                <label for="Address">Address:</label>
                <input type="text" name="Address" required>
                </div>
                <div class="form-group">
                <label for="UserName">Username:</label>
                <input type="text" name="UserName" required>
                </div>
                <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" name="Email" required>
                </div>
                <div class="form-group">
                <label for="Password">Enter Password:</label>
                <input type="password" name="Password1" required>
                </div>
                <div class="form-group">
                <label for="Password">Enter Password Again:</label>
                <input type="password" name="Password2" required>
                </div>
                <button class="button-home" style="width: 200px;" type="submit">Register</button>
            </form>

            <p style="font-size: large;" >Already have account? <button  class="register-link" onclick="loadLogin()">Login</button></p>
        </div>
        
    </div>


    <script>
        function loadLogin() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/loadLoginView";
        }
    </script>
</body>
</html>
