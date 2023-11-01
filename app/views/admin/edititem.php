<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Edit Product Item</title>
</head>
<body>
    
    <div class="container">
        <div class="sub-container navbar">
            <h1>Edit Product Item</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <?php echo $id; ?>

            <form  method="POST" style="padding: 3%;" action="http://localhost/we_bake/public/AdminControls/editproduct">

                <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                
                <div class="form-group">
                <label for="itemname">Item Name:</label><br>
                    <input type="text" id="itemname" name="itemname" require><br><br>
                </div>

                <div class="form-group"> 
                    <label for="retailprice">Retail Price:</label><br>
                    <input type="number" id="retailprice" name="retailprice"><br><br>
                </div> 
                <div class="form-group"> 
                    <label for="stockprice">Stock Price:</label><br>
                    <input type="number" id="stockprice" name="stockprice"><br><br>
                </div>
                <div class="form-group"> 
                    <label for="itemdescription">Item Description:</label><br>
                    <textarea id="itemdescription" name="itemdescription" rows="4"></textarea><br><br>
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
