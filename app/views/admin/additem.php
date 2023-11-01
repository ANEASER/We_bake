<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Add Product Item</title>
</head>
<body style="font-weight: 800">
    
    <div class="container">
        <div class="sub-container" style="width: 20%;">
            <h1 >Add Product Item</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="container" style="width: 80%;" >
            <form class="form-group" method="POST" style="padding: 3%;" action="addproductitem">

            <div class="form-group">
                <label for="itemname">Item Name:</label><br>
                <input type="text" id="itemname" name="itemname" required><br><br>
            </div>

            <div class="form-group">
                <label for="retailprice">Retail Price:</label><br>
                <input type="number" id="retailprice" name="retailprice" required><br><br>
            </div>

            <div class="form-group">
                <label for="stockprice">Stock Price:</label><br>
                <input type="number" id="stockprice" name="stockprice" required><br><br>
            </div>

            <div class="form-group">
                <label for="itemdescription">Item Description:</label><br>
                <textarea id="itemdescription" name="itemdescription" rows="4" required></textarea><br><br>
            </div>
            
            <div class="button-container">     
                <input class="button"  type="submit" value="Submit">
            </div>
            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "../AdminControls";
        }
    </script>
</body>
</html>
