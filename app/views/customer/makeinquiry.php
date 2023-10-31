<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Inquiry</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body>
    <div class="header">
        <h1>Place Your Inquiry Here</h1>
    </div>
    <div class="container">

        <?php
        include "sidebar.php"
        ?>
    
    <div class="sub-container" >
    <form action="dashboard.php">
        <h2 align="center">Inquiry Details</h2>

            <div class="formcontent" >
                    <div>
                        <h4>Customer ID:</h4>
                        <label>
                            <input name="CID" type="text" id="CID" value="<?php echo $row['CustomerID'];?>" required />
                        </label>
                    </div>
                    <div>
                        <h4>Customer Name:</h4>
                        <label>
                            <input name="customername" type="text" id="customername" value="<?php echo $row['CustomerName'];?>" required />
                        </label>
                    </div>
                    <div>
                        <h4>Email Address:</h4>
                        <label>
                            <input name="customeremail" type="email" id="customeremail" value="<?php echo $row['CustomerEmail'];?>" required />
                        </label>
                    </div>
                    <div class="form-group">
                        <h4>Mobile:</h4>
                        <label>
                            <input name="customermobile" type="text" id="customermobile" value="<?php echo $row['CustomerMobile'];?>" required />
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <h4>Inquiry:</h4>
                        <label>
                            <input name="customermobile" type="text" id="customermobile" value="<?php echo $row['CustomerMobile'];?>" required />
                        </label>
                    </div>
            </div>

            <input type="submit" value="Save">
            <input type="submit" value="Cancle">
        </form>
            
    </div>
</body>
</html>