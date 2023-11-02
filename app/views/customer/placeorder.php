<!DOCTYPE html>
<html>
<head>
    <title>Place Order - Bakery</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
    <style>
        
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

        label,p {
            display: block;
            font-weight: bold;
            font-size: large;
            text-align: center;
            color: brown;
            margin-top: 2%;
            margin-bottom:1%;
        }

        button.button-home {
            background: #BAA484;
           /* background: linear-gradient(90deg, rgba(255,211,196,1) 0%, rgba(121,82,9,0.5663515406162465) 44%, rgba(121,82,9,0.5803571428571428) 100%);
            transition: background 0.5s;*/
            border: none;
            border-radius: 5px;
            height: 30px;
            font-size: 1em;
            margin: 3% 15% 0% 25%;
            margin-left: 30%;
            padding: 0% 5% 0% 5%;
            color: white ;
        }

        button.button-home:hover {
           /* background: rgb(255,211,196);
            color: darkgoldenrod;
            font-weight: 11000;*/
            background-color: #BAA484;
        } 
        .form1{
            margin-left: 280px;
            margin-bottom: 15px;
        }
        
    </style>
</head>
<body style="font-family: 'Poppins', sans-serif;">
   
    <div class="container">

        <?php
        include "sidebar.php"
        ?>

        <div class="sub-container">
        <h1 style="text-align:center;">Checkout </h1>
            <div style="display: flex; flex-direction:column">
            <table style="margin-left:30%;">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chocolate Croissant</td>
                            <td>Rs.250.00</td>
                            <td>2</td>
                            <td>Rs.500.00</td>
                        </tr>
                        <tr>
                            <td>Blueberry Muffin</td>
                            <td>Rs.200.00</td>
                            <td>3</td>
                            <td>Rs.600.00</td>
                        </tr>
                        <tr>
                            <td>Cinnamon Roll</td>
                            <td>Rs.200.00</td>
                            <td>1</td>
                            <td>Rs.200.00</td>
                        </tr>
                    </tbody>
                </table>
                <form action="customerdash.php">
                    <div class="form1">
                        <label style="color:black;margin-top:6%;"for="daterequired">Date Required:</label>
                        <input style="text-align:center;margin-left:35%; margin-top:1%; width:30%;"type="date" id="daterequired" name="daterequired">
                    </div>
                <p style="color:black; margin-left:20%;"><b>No. of units :</b> 06 </p>
                <p style="color:black; margin-left:20%;"><b>Total :</b> Rs.1300 </p>
                    <button type="submit" class="button-home" value="Confirm Order"> Confirm </button>
                </form>
                </div>
                
        </div>
        
        
    </div>
</body>
</html>
