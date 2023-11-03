
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
    <style>
        .homeisland {
            background: rgba(255, 183, 88, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(14.3px);
            -webkit-backdrop-filter: blur(14.3px);
            border: 1px solid rgba(255, 255, 255, 0.14);
            font-weight: bolder;
            
        }

        th, td {
            text-align: center;
            padding: 10%;
        }
    </style>
</head>
<body style="background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-large-display-of-bread-picture-image_2664293.jpg'); 
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            background-size: cover;">
    
        <?php
        include "sidebar.php"
        ?>
        
    <div class="sub-container" style="margin-left: 20%;margin-right:20%;">
        <div class="homeisland sub-container" style="display:flex; justify-content:space-around; flex-direction: column; padding:10%">
        <table>
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
                    <td>$2.50</td>
                    <td>2</td>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <td>Blueberry Muffin</td>
                    <td>$1.75</td>
                    <td>3</td>
                    <td>$5.25</td>
                </tr>
                <tr>
                    <td>Cinnamon Roll</td>
                    <td>$2.00</td>
                    <td>1</td>
                    <td>$2.00</td>
                </tr>
            </tbody>
        </table>
        <button class="button2" onclick="placeorder()" >Checkout</button>
        
        </div>
    
    </div>
    <script>
        function placeorder(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/placeorder";
    }
    </script>
</body>
</html>
