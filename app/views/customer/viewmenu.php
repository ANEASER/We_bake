<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body>
<div class="header">
        <h1>Our Menu</h1>
    </div>
    <div class="container">

    <?php
        include "sidebar.php"
        ?>
    
        <div>
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
            <td>C01</td>
            <td>Item 1</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.200</td>
            <td>Buns</td>

            <tr>
            <td>C02</td>
            <td>Item 2</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
            <td>Rs.400</td>
            <td>Buns</td>

            <tr>
            <td>C03</td>
            <td>Item 3</td>
            <td><img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image1"  width="300" height="300"></td>
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
