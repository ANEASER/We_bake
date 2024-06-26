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
            <h1 style="text-align: center;">Place Your Feedbacks</h1>
            <br>
            <div class="form-group">
                    <textarea id="inquirytext" name="inquirytext" row="10" required></textarea><br>
                    <p id="charCount" style="font-size: 10px;">Characters remaining: 250</p>
            </div>
                
                <input class="bluebutton"  type="submit" value="Submit">
            </form>
        </div>
    </section>
    <script>
        document.getElementById('inquirytext').addEventListener('input', function () {
            var charCount = 250 - this.value.length;
            document.getElementById('charCount').innerText = 'Characters remaining: ' + charCount;
            if (charCount <= 0) {
                this.value = this.value.substring(0, 249);
            }
        });
    </script>
</body>
</html>

