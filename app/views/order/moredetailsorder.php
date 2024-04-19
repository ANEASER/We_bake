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
                include '..\app\views\customer\customernav.php';
            } elseif ($_SESSION["USER"]->Role == "admin") {
                include '..\app\views\admin\adminnav.php';
            } elseif ($_SESSION["USER"]->Role == "billingclerk") {
                include '..\app\views\billingclerk\bcnavbar.php';
            } elseif ($_SESSION["USER"]->Role == "productionmanager") {
                include '..\app\views\productionmanager\pmnavbar.php';
            } elseif ($_SESSION["USER"]->Role == "receptionist") {
                include '..\app\views\receptionist\recnavbar.php';
            } elseif ($_SESSION["USER"]->Role == "outletmanager") {
                include '..\app\views\outletmanager\omnavbar2.php';
            }
            else {
                echo "no navbar";
            }
        } else {
            echo "no navbar";
        }
    ?>

    <section class="content">
        <section class="cart" style="padding : 2%;font-size: 1em;">
                <?php
                    echo "<h1>Order : ".$order[0]->orderref."</h1>";
                    echo "<h1>Order Status : ".$order[0]->orderstatus."</h1>";
                    echo "<h1>Order Delivery Date : ".$order[0]->orderdate."</h1>";
                    echo "<h1>Order Delivery Address : ".$order[0]->deliver_address."</h1>";
                    echo "<h1>Order Delivery Status : ".$order[0]->deliverystatus."</h1>";
                    echo "<h1>Order Payment Status : ".$order[0]->paymentstatus."</h1>";
                    echo "<h1>Order Total : ".$order[0]->total."</h1>";
                    echo "<h1>Order Paid Amount : ".$order[0]->paid_amount."</h1>";

                    echo "<br>";
                    echo "<table>";
                    echo "<tr>
                            <th>Item Code </th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>";

                    foreach ($productorderlines as $productorderline) {
                        
                        $productitem = new ProductItem();
                        $item = $productitem->where('Itemcode', $productorderline->Itemcode);
                        
                        echo "<tr>";
                        echo "<td>" . $productorderline->Itemcode . "</td>";
                        echo "<td>" . $item[0]->itemname. "</td>";
                        echo "<td>" . $productorderline->quantity . "</td>";
                        echo "<td>" . $productorderline->price . "</td>";
                        echo "<td>" . $productorderline->totalprice . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";

                    if ($proofs > 0) {
                        echo "<div style='display:flex; padding:3%; justify-content: space-around'>";
                        foreach ($proofs as $proof) {
                            echo "<div style='display:flex; flex-direction:column'>";
                            echo "<img src='data:image/jpeg;base64," .$proof->proofdocument. "' alt='Proof Image' height=200px width=170px onclick='enlargeImage(this)'>";
                            echo "Total Price : ".$proof->Type."<br>";
                            echo "</div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<h1>No payment proof uploaded</h1>";
                    }

                    ?>
                <button class="bluebutton" onclick="backtoorders()">Back to Orders</button>
        </section>
    </section>
    <script>
    var BASE_URL = "<?php echo BASE_URL; ?>";


    // Make sure to properly encode the user information
    var user = <?php echo json_encode($_SESSION["USER"]); ?>;
    
    function backtoorders() {
        if (!user.Role) {
            window.location.href = BASE_URL + "CustomerControls/purchasehistory";
        } else if (user.Role === "billingclerk") {
            window.location.href = BASE_URL + "BillingControls";
        } else if (user.Role === "productionmanager") {
            window.location.href = BASE_URL + "pmcontrols/pendingOrdersView";
        } else if (user.Role === "receptionist") {
            window.location.href = BASE_URL + "RecieptionControls/viewhistory";
        } else if (user.Role === "admin") {
            window.location.href = BASE_URL + "outletcontrols";
        } else if (user.Role === "outletmanager") {
            window.location.href = BASE_URL + "CustomerControls/purchasehistory";
        } else {
            window.location.href = BASE_URL + "CustomerControls/purchasehistory";
        }
    }

    function enlargeImage(image) {
    // Create a modal for image enlargement
        var modal = document.createElement('div');
        modal.style.display = 'flex';
        modal.style.alignItems = 'center';
        modal.style.justifyContent = 'center';
        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.left = '0';
        modal.style.width = '100%';
        modal.style.height = '100%';
        modal.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        modal.style.zIndex = '1';

        // Create an image element inside the modal
        var enlargedImage = document.createElement('img');
        enlargedImage.src = image.src;
        enlargedImage.style.maxWidth = '90%';
        enlargedImage.style.maxHeight = '90%';

        // Append the image to the modal
        modal.appendChild(enlargedImage);

        // Close the modal when clicking outside the image
        modal.onclick = function() {
            modal.style.display = 'none';
        };

        // Append the modal to the body
        document.body.appendChild(modal);
    }


    </script>


        
</body>
</html>