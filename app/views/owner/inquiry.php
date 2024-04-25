<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <title>Store Manager_Stocks</title>
</head>
<body>
    <?php
        include "ownernavbar.php";
    ?>

    <section style="width: 100%; padding:1%">
        <div class="content">
            <h1>Stocks</h1>
            
        </div>
    </section>


    <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure 
        if (count($inquiry) > 0){
            echo '<table style="width:90%">';
            echo '<tr>
                    <th> Inquiry ID </th>
                    <th> Placed By </th>
                    <th> Address</th>
                    <th> Subject</th>
                    <th> Inquiry</th>
                    <th> Comment</th>
                </tr>';

                foreach($stocks as $stocks){
                    echo '<tr>';
                    echo '<td>' . $inquiry->inquiryid . '</td>';
                    echo '<td>' . $inquiry->placeby . '</td>';
                    echo '<td>' . $inquiry->address . '</td>';
                    echo '<td>' . $inquiry->inquirysubject . '</td>';
                    echo '<td>' . $inquiry->inquirytext . '</td>';
                    echo '<td>' . $inquiry->comment . '</td>';
                    echo '</tr>';

                }
            echo '</table>';

        }

        else{
            echo '<h3> No stocks available </h3>';
        }
        
    ?>
    </section>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";


    </script>
</body>
</html>
