<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="smstyle.css">
    <title>Store Manager_ Suppliers</title>
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
        <h1>Update Stocks</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Include the database connection file
            require('database.php');
    
            // Get form data
            $supplierName = $_POST['name'];
            $supplierContactNumber = $_POST['contactno'];
            $supplierAddress = $_POST['address'];
            $supplierEmail = $_POST['email'];
            $supplierRating = $_POST['Ratings'];

            // SQL query to insert data into the database
            $sql = "INSERT INTO suppllier (name, contactno, address, email, Ratings) 
                    VALUES ('$supplierName', '$supplierContactNumber', '$supplierAddress', '$supplierEmail', '$supplierRating')";
    
            if ($conn->query($sql) === TRUE) {
                echo "Supplier added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
            // Close the database connection
            $conn->close();
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" id="supplierName" name="name" required>
            </div> 
            <div class="form-group"> 
                <label for="suppliercontactnumber">Supplier Contact No.:</label> 
                <input type="text" id="suppliercontactnumber" name="contactno" required>
            </div>
            <div class="form-group"> 
                <label for="supplierAddress">Supplier Address:</label> 
                <input type="text" id="supplierAddress" name="address" required>
            </div>

            <div class="form-group">
                <label for="SupplierEmail">Supplier Email:</label>
                <input type="text" id="SupplierEmail" name="email" required>
            </div>

            <div class="form-group">
                <label for="SupplierRating">Supplier Rating:</label>
                <input type="text" id="SupplierRating" name="Ratings" required>
            </div>
            <div class="button-container">
                <button type="submit">Save</button>
            </div>

        </form>
            
    </div>
    <script src="script.js"></script>
</body>
</html>
