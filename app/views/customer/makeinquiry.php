<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Inquiry</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body style="font-family: 'Poppins', sans-serif;">
   <!-- <div class="header">
        <h1>Place Your Inquiry Here</h1>
    </div>-->
    

        <?php
        include "sidebar.php"
        ?>
    
    <div class="sub-container" >
    <h1style="text-align:center;">Place Your Inquiry Here</h1style=>
    <form action="customerdash.php">
        <h2 align="center">Inquiry Details</h2>

            <div class="formcontent" >
                    <div class="form-group">
                        <h4>Customer ID:</h4>
                        <label>
                            <input name="CID" type="text" id="CID" required />
                        </label>
                    </div>
                    <div class="form-group">
                        <h4>Customer Name:</h4>
                        <label>
                            <input name="customername" type="text" id="customername" required />
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
                            <input name="customermobile" type="text" id="customermobile"  required />
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <h4>Inquiry:</h4>
                        <label>
                            <input name="customermobile" type="text" id="customermobile"  required />
                        </label>
                    </div>
            </div>

            <input style="margin-left:50%; margin-top:5%;" type="submit" value="Save">
            <input type="submit" value="Cancle">
        </form>
            
    </div>
</body>
</html>