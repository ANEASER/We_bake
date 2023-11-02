<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Create Add</title>
    <style>
        .add{
            width: 30%;
        }
        
        input[type="file"]
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
    
   
    <?php
        include "adminnav.php"
    ?>

        <div class="content" style="width:70%;display: flex;flex-direction: row; justify-content:space-around">
            <div class="add">
                <img src="http://localhost\we_bake\app\views\customer\customermedia\buns.avif" alt="Advertistments"  style="margin-left:20px; margin-right:20px;" width="400" height="300">
                <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="image1">Upload Image 1:</label>
                    <input type="file" name="image1" id="image1" accept="image/*" required><br><br>
                </div>
                <div class="button-container"> 
                    <input class="formbutton" type="submit" name="submit" value="Upload">
                </div> 
                </form>
            </div>
           
            <div  class="add">
                <img src="http://localhost\we_bake\app\views\customer\customermedia\shorteat.avif" alt="Advertistments" style="margin-left:20px; margin-right:20px;"  width="400" height="300">
                <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image2">Upload Image 2:</label>
                    <input type="file" name="image2" id="image2" accept="image/*" required><br><br>
                </div> 
                <div class="button-container"> 
                    <input class="formbutton" type="submit" name="submit" value="Upload">
                </div> 
                </form>
            </div>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/AdminControls";
        }
    </script>
</body>
</html>
