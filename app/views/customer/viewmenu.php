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
            <td>B01</td>
            <td>Bread</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\bread.avif" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.200</td>
            <td>Whole flour bread which weighs 200g</td>

            <tr>
            <td>C02</td>

            <td>Cup cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.70</td>

            <td>Item 2</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\ad.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.400</td>

            <td>Buns</td>

            <tr>
            <td>C03</td>

            <td>Fish bun</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.100</td>
            <td>Buns</td>
            
        </tr>

        <tr>
            <td>C03</td>
            <td>Butter Cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.700</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Roles</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Sweet Roals</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Muffins</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.70</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Garlic Bread</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.200</td>
            <td>Buns</td>
            
        </tr>

        <tr>
            <td>C03</td>
            <td>Chocolate cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.800</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Chocolate Lava Cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            
        </tr>

        <tr>
            <td>C03</td>
            <td>Egg Bun</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.100</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Chocolate Lava Cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.170</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Sponge Cake</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.190</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Donuts</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.50</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Pastry</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.90</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Shortbread</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.100</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Croissant</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Tarte Tatin</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.130</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Tarte Tropezienne</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.120</td>
            <td>Buns</td>
            
        </tr>
        <tr>
            <td>C03</td>
            <td>Chocolate Twist</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Item 3</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\ad.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.150</td>
            <td>Buns</td>
            
        </tr>
        



        </table>

        </div>       
            
    </div>
    <script src="script.js"></script>
</body>
</html>


   
</div>
</body>
</html>
