<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Edit Stock Item</title>
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
