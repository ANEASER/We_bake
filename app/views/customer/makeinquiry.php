<!DOCTYPE html>
<html>
<head>
    <title>Make Inquiry</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
</head>
<body>

    <?php
    if (isset($_SESSION["USER"]) && !isset($_SESSION["USER"]->role)) {
        include 'customernav.php';
    }    
    ?>
   
    <section>
        <div class="form-container">
        <form class="form" action="<?php echo BASE_URL; ?>customercontrols/makeinquiry" method="post">
            <div class="form-group">
                    <label for="placeby">NAME:</label>
                    <input type="text" id="placeby" name="placeby" required><br>
            </div>
            <div class="form-group">
                    <label for="address">ADDRESS:</label>
                    <input type="text" id="address" name="address" required><br>
            </div>
            
             <div class="form-group">
                    <label for="inquirysubject">INQUIRY SUBJECT:</label>
                    <input type="text" id="inquirysubject" name="inquirysubject" required><br>
            </div>

            <div class="form-group">
                    <label for="inquirytext">INQUIRY:</label>
                    <textarea id="inquirytext" name="inquirytext" row="10" required></textarea><br>
            </div>
                
                <input class="bluebutton"  type="submit" value="SUBMIT">
            </form>
        </div>
    </section>
    
</body>
</html>

