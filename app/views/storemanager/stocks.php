<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="smstyle.css">
    <title>Store Manager_Stocks</title>
</head>
<body>
<div class="navbar">
        <h1 class="dashboard"> Store Manager Dashboard</h1>
        <ul>
            <li><a href="smdash.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="supplier.php">Suppliers</a></li>
            <li><a href="stocks.php">Stocks</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Stocks</h1>

        <div class="suppdash">
            <button onclick="window.location.href='addstock.php'">Add New Stock Item</button>
        </div>
        <div>
        <table>
            <tr>
                <th>Supplier Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Update</th>
                <th>Delete</th>
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
            <td>Supplier 1</td>
            <td>0771234567</td>
            <td>Address 1</td>
            <td>email1@email.com</td>
            <td>4</td>
            <td><button onclick="window.location.href='updatesupplier.php'">Update</button></td>
            <td><button onclick="window.location.href='deletesupplier.php'">Delete</button></td>
            
        </tr>
        </table>

        </div>       
            
    </div>
    <script src="script.js"></script>
</body>
</html>