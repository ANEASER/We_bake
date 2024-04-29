<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <title>Store Manager_Production</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    

    <section style="display:flex;justify-content:space-around; width:100%; margin-top: 30px;">
     <?php //The table structure 
        if (count($stockorder) > 0){
            echo '<table style="width:90%">';
            echo '<tr>
                    <th> Order ID </th>
                    <th> Unique ID </th>
                    <th> Order Date </th>
                    <th> Comment </th>
                    <th> Status</th>
                    <th> View Order</th>
                    <th> Accept Order</th>
                </tr>';

                foreach($stockorder as $stockorder){
                    echo '<tr>';
                    echo '<td>' . $stockorder->id . '</td>';
                    echo '<td>' . $stockorder->unique_id . '</td>';
                    echo '<td>' . $stockorder->ondate . '</td>';
                    echo '<td>' . $stockorder->comment . '</td>';
                    echo '<td>' . $stockorder->status . '</td>';
                    echo '<td> <button class="yellowbutton" onclick="view(\'' . $stockorder->unique_id . '\')">View</button></td>';
                    echo '<td>';
                    if ($stockorder->status == 'pending') {
                        echo '<button class="greenbutton" onclick="accept(\'' . $stockorder->unique_id .'\')">Accept</button>';
                    } else {
                        echo '<button class="bluebutton">Accepted</button>';
                    }
                    echo '</td>';
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

        function view(unique_id) {
            window.location.href = BASE_URL +  "StoreControls/loadViewOrder/"+unique_id;
        }

        function accept(unique_id) {
            window.location.href = BASE_URL +  "StoreControls/acceptFullOrder/"+unique_id;
        }


    </script>
</body>
</html>
