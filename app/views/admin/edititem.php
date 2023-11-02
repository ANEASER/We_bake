<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Edit Product Item</title>
    <style>
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        textarea,
        select
        {
            width: 60%;
            padding: 10px;
            margin-bottom: 10px;
            margin-right: 10px;
            border: 1px solid #D9D9D9;
            border-radius: 5px;
            background: #D9D9D9;
            align-items: center;
            align-self: center;
        }

        .formbutton {
                background-color: #bc9b72;
                color: white;
                padding: 10px 30px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                align-self: center;
            }


            button:hover {
                background-color: #9b7b54;
            }

    </style>
</head>
<body>
    
    <div class="container">
    <?php
        include "adminnav.php"
    ?>

        <div class="content">
            <form  method="POST" style="padding: 3%;" action="http://localhost/we_bake/public/AdminControls/editproduct">

                <input type="hidden" name="id" value="<?php echo $data[0]->itemid; ?>"> 
                
                <div class="form-group">
                <label for="itemname">Item Name:</label><br>
                    <input type="text" id="itemname" name="itemname" placeholder="<?php echo $data[0]->itemname; ?>"><br><br>
                </div>

                <div class="form-group"> 
                    <label for="retailprice">Retail Price:</label><br>
                    <input type="number" id="retailprice" name="retailprice" placeholder="<?php echo $data[0]->retailprice; ?>"><br><br>
                </div> 
                <div class="form-group"> 
                    <label for="stockprice">Stock Price:</label><br>
                    <input type="number" id="stockprice" name="stockprice" placeholder="<?php echo $data[0]->stockprice; ?>"><br><br>
                </div>
                <div class="form-group"> 
                    <label for="itemdescription">Item Description:</label><br>
                    <textarea id="itemdescription" name="itemdescription" rows="4" placeholder="<?php echo $data[0]->itemdescription; ?>"></textarea><br><br>
                </div>
                <div class="button-container" style="align-self: left"> 
                    <input class="formbutton" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/loadItemsView";   
        }
    </script>
</body>
</html>
