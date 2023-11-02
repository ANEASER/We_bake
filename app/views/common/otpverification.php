<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    padding: 15%;
                    color:#fff;
                    margin-top: 15%;
                    border-radius: 15px;
                    margin: 0 auto;
                    text-align: center;
                }

            label,p {
                display: block;
                font-weight: bold;
                font-size: large;
                text-align: center;
                color:#fff;
                
            }

            input[type="text"],
            input[type="password"],
            input[type="number"] {
                width: 50%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-top:5%;
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
                font-size: large;
                color:#fff;
                text-decoration: underline; 
                cursor: pointer;
                padding: 0;
                margin: 0;
            }

    </style>

    <title>Login</title>
</head>
<body>
    <div style="width: 50%; margin: 0% 25% 0% 25%;">
        
        <form method="POST" action="otpvalidation" class="formisland">
            <h1 style="text-align: center; color:#fff; margin-bottom:15%">Verify Your E-Mail</h1>
            <div class="form-group">
                <label for="otp">Enter the OTP code sent to your Email</label>
                <input type="text" id="otp" name="otp" required>

            <button class="button-home" style="width: 200px;" type="submit">confirm</button>

            </div>
        </form>
        <p>did't recieve OTP? <button  class="register-link" onclick="resend()">Resend</button></p>
    </div>
    <script>
        function resend() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/otpvalidation";
        }
    </script>

</body>
</html>
