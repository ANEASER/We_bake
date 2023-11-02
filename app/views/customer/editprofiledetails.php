<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Details</title>

    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body style="font-family: 'Poppins', sans-serif;">

        <?php
        include "sidebar.php"
        ?>
            <div class="sub-container">
            <h1 style="text-align:center;">Edit Your Profile Details</h1>
            <form action="dashboard.php">
                <div class="formcontent" >
                    <div class="form-group">
                        <h4>Customer ID:</h4>
                        <label>
                            <input name="CID" type="text" id="CID"  required />
                        </label>
                    </div>
                    <div class="form-group">
                        <h4>Customer Name:</h4>
                        <label>
                            <input name="customername" type="text" id="customername"  required />
                        </label>
                    </div>
                    <div class="form-group">
                        <h4>Address:</h4>
                        <label>
                            <input name="customeraddress" type="text" id="customeraddress"  required />
                        </label>
                    </div>

                    <div class="form-group">
                        <h4>City:</h4>
                        <label>
                            <input name="customercity" type="text" id="customercity" required />
                        </label>
                    </div>

                    <div class="form-group">
                        <h4>Email Address:</h4>
                        <label>
                            <input name="customeremail" type="email" id="customeremail"  required />
                        </label>
                    </div>
                    <div class="form-group">
                        <h4>Mobile:</h4>
                        <label>
                            <input name="customermobile" type="text" id="customermobile" value="<?php echo $row['CustomerMobile'];?>" required />
                        </label>
                    </div class="form-group">
                    <div>
                    <input type="submit" name="submit" id="submit" value="Update Profile" />
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>