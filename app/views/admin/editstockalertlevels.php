<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Edit Stock Item</title>
</head>
<body >
    
    <div class="container">
    <?php
        include "adminnav.php"
    ?>


        <div class="content">
            <form  method="POST">
                <div class="form-group">
                    <label for="minimum">Minimum:</label><br>
                    <input type="number" id="minimum" name="minimum" ><br><br>
                </div>

                <div class="form-group">
                    <label for="critical">Critical:</label><br>
                    <input type="number" id="critical" name="critical" ><br><br>
                </div>

                <div class="form-group">
                    <input class="formbutton"  type="submit" value="Submit">
                </div>

            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/AdminControls";   
        }
    </script>
</body>
</html>
