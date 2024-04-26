<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>More order Details</title>
</head>
<body>

<?php
    if (isset($_SESSION["USER"])) {
        if (!isset($_SESSION["USER"]->Role)) {
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'customernav.php';
            } elseif ($_SESSION["USER"]->Role == "admin") {
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'adminnav.php';
            } elseif ($_SESSION["USER"]->Role == "billingclerk") {
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'billingclerk' . DIRECTORY_SEPARATOR . 'bcnavbar.php';
            } elseif ($_SESSION["USER"]->Role == "productionmanager") {
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'productionmanager' . DIRECTORY_SEPARATOR . 'pmnavbar.php';
            } elseif ($_SESSION["USER"]->Role == "receptionist") {
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'receiptionist' . DIRECTORY_SEPARATOR . 'recnavbar.php';
            } elseif ($_SESSION["USER"]->Role == "outletmanager") {
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'outlet' . DIRECTORY_SEPARATOR . 'omnavbar2.php';
            } elseif ($_SESSION["USER"]->Role == "productionmanager") {
                include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'customernav.php';
            } else {
                echo "no navbar";
            }
        } else {
            echo "no navbar";
        }
    ?>
<section class="content">
        <section class="cart" style="padding : 2%;font-size: 1em;">
               <?php
                    echo "<table>";
                    echo "<tr>
                            <th>RawName</th>
                            <th>Quantity</th>
                            <th>UnitOfMeasurement</th>
                            <th>Type of Request</th>
                        </tr>";

                    foreach ($stockorderlines as $orderline) {
                        echo "<tr>";
                        echo "<td>" . $orderline->RawName . "</td>";
                        echo "<td>" . $orderline->quantity . "</td>";
                        echo "<td>" . $orderline->UnitOfMeasurement . "</td>";
                        echo "<td>" . $orderline->req_type . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    ?>
                <br>
                <div style="display:flex;justify-content:center">
                    <button class="bluebutton" onclick="backtoorders()">Back to Orders</button>
                </div>
        </section>
    </section>
    <script>
    var BASE_URL = "<?php echo BASE_URL; ?>";


    // Make sure to properly encode the user information
    var user = <?php echo json_encode($_SESSION["USER"]); ?>;
    
    function backtoorders() {
        if (user.Role === "productionmanager") {
            window.location.href = BASE_URL + "pmcontrols/rmHistoryView";
        } else {
            window.location.href = BASE_URL + "CommonControls/logout";
        }
    }

    </script>

</body>
</html>