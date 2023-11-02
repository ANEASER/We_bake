<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .buttonisland {
            background: rgba(255, 255, 255, 0.4);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(14.3px);
            -webkit-backdrop-filter: blur(14.3px);
            border: 1px solid rgba(255, 255, 255, 0.14);
        }

        button {
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

        button:hover {
            background: rgb(255,211,196);
            color: darkgoldenrod;
            font-weight: 11000;
        }

    </style>
    
</head>
<body style="background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-large-display-of-bread-picture-image_2664293.jpg'); 
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            
            background-size: cover; 
            margin: 0;
            padding: 0;">
    
        <div style="display: flex; flex-direction:row;">
            <div class="textisland" style="width: 50%; padding-left:5%;padding-top:10%; color:aliceblue; font-size:xx-large">
                <p><span style="font-weight: bolder; font-size:2em">For</span>
                <span style="font-weight: bolder; font-size:2em"> Your</span><br>
                <span style="font-weight: bolder; font-size:3em">Greatest </span><br>
                <span style="font-weight: bolder; font-size:5em"> Tatse....</span></p>
            </div>

            
            <div class="buttonisland" style="display: flex; flex-direction:column;width: 50%; height: 782px;justify-content:space-around">
            
                <div style="display: flex; flex-direction:column;">
                    <img src="http://localhost\we_bake\app\views\customer\customermedia\logo.png" style="border-radius: 50%; margin:0 0 0 35%" alt="WE BAKE Logo" width="30%" >
                    <button onclick="loadLogin()" class="buttonhome" style="margin-top: 15%">Login</button>
                    <button onclick="loadRegister()" class="buttonhome">Register</button>
                </div>
            </div>
        </div>

    
    <script>
        function loadLogin() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/loadLoginView";
        }

        function loadRegister() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/loadRegisterView";
        }

        func

    </script>
</body>
</html>
