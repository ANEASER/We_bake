<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Create Add</title>

    <style>
        .adds{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
    </style>
</head>
<body>
        <?php
            include "adminnav.php"
        ?>
        <section class="adds">
            <div>
               <p>Section 1 Desktop</p>
               <img src="../media/uploads/Advertiesments/bg1.jpg" alt="" height="300px" >
            </div>  
            <div>
                <p>Section 1 Mobile</p>
               <img src="../media/uploads/Advertiesments/bg1m.jpg" alt="" height="300px">
            </div>  
               <form class="form" action="<?php echo BASE_URL ?>AdminControls/createAdvertisement1" method="post" enctype="multipart/form-data">
                    <label for="image">Update Section 1</label>
                    <select name="type" id="">
                        <option value="Desktop">Desktop</option>
                        <option value="Mobile">Mobile</option>
                    </select>
                    <input type="file" name="image" id="image">
                    <input class="greenbutton" type="submit" value="Upload Image" name="submit">
               </form>
        </section>
        <section class="adds">
            <div>
               <p>Section 2 Desktop</p>
               <img src="../media/uploads/Advertiesments/bg2.jpg" alt="" height="300px">
            </div>  
            <div>
               <p>Section 2 Mobile</p>
               <img src="../media/uploads/Advertiesments/bg2m.jpg" alt="" height="300px">
            </div>         
               <form class="form" action="<?php echo BASE_URL ?>AdminControls/createAdvertisement2" method="post" enctype="multipart/form-data">
                    <label for="image">Update Section 2</label>
                    <select name="type" id="">
                        <option value="Desktop">Desktop</option>
                        <option value="Mobile">Mobile</option>
                    </select>
                    <input type="file" name="image" id="image">
                    <input class="greenbutton" type="submit" value="Upload Image" name="submit">
               </form>
        </section>
        <section class="adds">
            <div>
               <p>Section 3 Desktop</p>
               <img src="../media/uploads/Advertiesments/bg3.jpg" alt="" height="300px">
            </div>  
            <div>
               <p>Section 3 Mobile</p>
               <img src="../media/uploads/Advertiesments/bg3m.jpg" alt="" height="300px">
            </div> 
               <form class="form" action="<?php echo BASE_URL ?>AdminControls/createAdvertisement3" method="post" enctype="multipart/form-data">
                    <label for="image">Update Section 3</label>
                    <select name="type" id="">
                        <option value="Desktop">Desktop</option>
                        <option value="Mobile">Mobile</option>
                    </select>
                    <input type="file" name="image" id="image">
                    <input class="greenbutton" type="submit" value="Upload Image" name="submit">
               </form>
        </section>
</body>
</html>
