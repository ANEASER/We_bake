<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body style="font-family: 'Poppins', sans-serif;">
<!--<div class="header">
        <h1>Our Menu</h1>
    </div>-->
    <div class="container">

    <?php
        include "sidebar.php"
        ?>
    
        <div>
        <h1 style="text-align:center;">Our Menu</h1>
        <table>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Description</th>
                <th>Add to Cart</th>

            </tr>
            <?php
            // Include the database connection file
            /*require('database.php');

            // SQL query to retrieve supplier details
            $sql = "SELECT * FROM suppllier";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["contactno"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["Rating"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No suppliers found.</td></tr>";
            }

            // Close the database connection
            $conn->close();*/
            ?>
            <tr>
            <td>I01</td>
            <td>Bread</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\bread.avif" alt="Bread" class="image1"  width="300" height="300"></td>
            <td>Rs.200</td>
            <td>Whole flour bread which weighs 200g</td>
            <td><button onclick="addCart()">add</button></td> 
            </tr>
            

            <tr>
            <td>I02</td>
            <td>Cup cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\cupcake.avif" alt="Cupcake" class="image1"  width="300" height="300"></td>
            <td>Rs.70</td>
            <td>Flavours and colors can be customised according to your preference</td>
            <td><button onclick="addCart()">add</button></td> 
            </tr>

            <tr>
            <td>I03</td>
            <td>Fish bun</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\buns.jpg" alt="Fish bun" class="image1"  width="300" height="300"></td>
            <td>Rs.100</td>
            <td>A fish bun is a popular snack consisting of spiced fish filling encased in a soft, baked or fried bread roll.</td>   
            <td><button onclick="addCart()">add</button></td> 
        </tr>


        <tr>
            <td>I04</td>
            <td>Butter Cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\buttercake.jpg" alt="Butter Cake" class="image1"  width="300" height="300"></td>
            <td>Rs.700</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I05</td>
            <td>Roles</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\rolls.jpeg" alt="Rolls" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I06</td>
            <td>Sweet Roals</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\sweetrolls.jpg" alt="Sweet Roals" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I07</td>
            <td>Muffins</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\muffins.jpg" alt="Muffins" class="image1"  width="300" height="300"></td>
            <td>Rs.70</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I08</td>
            <td>Garlic Bread</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\garlicbread.jpeg" alt="Garlic Bread" class="image1"  width="300" height="300"></td>
            <td>Rs.200</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>

        <tr>
            <td>IO9</td>
            <td>Chocolate cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\chcake.jpg" alt="Chocolate cake" class="image1"  width="300" height="300"></td>
            <td>Rs.800</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I10</td>
            <td>Chocolate Lava Cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\chlavacake.jpeg" alt="Chocolate Lava Cake" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>

        <tr>
            <td>I11</td>
            <td>Egg Bun</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\eggun.jpeg" alt="Egg Bun" class="image1"  width="300" height="300"></td>
            <td>Rs.100</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I12</td>
            <td>Croissant</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\Croissant.jpg" alt="Croissant" class="image1"  width="300" height="300"></td>
            <td>Rs.170</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I13</td>
            <td>Sponge Cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\spongecake.jpeg" alt="Sponge Cake" class="image1"  width="300" height="300"></td>
            <td>Rs.190</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I14</td>
            <td>Donuts</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\shorteat.avif" alt="Donuts" class="image1"  width="300" height="300"></td>
            <td>Rs.50</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td> 
            
        </tr>
        <tr>
            <td>I15</td>
            <td>Pastry</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\buns.avif" alt="Pastry" class="image1"  width="300" height="300"></td>
            <td>Rs.90</td>
            <td>Buns</td>
            <td><button onclick="addCart()">add</button></td>  
            
        </tr>
        

        </table>

        </div>       
            
    </div>
    <script >
        
    </script>
</body>
</html>


   
</div>
</body>
</html>
