<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <title>Store Manager_Supplies</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    <div class="content">
        <h1>Supply Records</h1>
        
    </div>

    <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure 
        if (count($supplies) > 0){
            echo '<table style="width:90%">';
            echo '<tr>
                    <th> Supply ID </th>
                    <th> Stock Item ID </th>
                    <th> Delivered Date</th>
                    <th> Invoice Number</th>
                    <th> Expiry date</th>
                    <th> Delivered Quantity</th>
                    

                    <th> Update</th>
                    <th> Delete</th>
                </tr>';

                foreach($supplies as $supplies){
                    echo '<tr>';
                    echo '<td>' . $supplies->SupplyID . '</td>';
                    echo '<td>' . $supplies->StockItemID . '</td>';
                    echo '<td>' . $supplies->DeliveredDate . '</td>';
                    echo '<td>' . $supplies->InvoiceNo . '</td>';
                    echo '<td>' . $supplies->ExpiryDate . '</td>';
                    echo '<td>' . $supplies->DeliveredQuantity . '</td>';
                    // echo '<td> <button class="yellowbutton" onclick="updateStocks(' . $stocks->ItemID . ')">Update</button></td>';
                    // echo '<td class="hideonmobile"><button class="redbutton" onclick="deleteStocks(' . $stocks->ItemID . ')">Delete</button></td>';
                    echo '</tr>';

                }
            echo '</table>';

        }

        else{
            echo '<h3> No supply records available </h3>';
        }
        
    ?>
    </section>
    <!-- <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function addStockItem() {
            window.location.href = BASE_URL +  "StoreControls/addStock";
        }

        function insertSupply() {
            window.location.href = BASE_URL +  "StoreControls/insertSupply";
        }

        function updateStocks(id) {
            window.location.href = BASE_URL +  "StoreControls/updateStocks/"+id;
        }

        function deleteStocks(id) {
            const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "redbutton",
                        cancelButton: "yellowbutton"
                    },
                    buttonsStyling: false
                });

                SwalwithButton.fire({
                    title: "Are you sure you want to delete this Item?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    preConfirm: async () => {
                        try {
                            await SwalwithButton.fire({
                                title: "Deleted!",
                                text: "Item has been deleted.",
                                icon: "success",
                                confirmButtonText: "OK",
                                confirmButtonClass: "greenbutton"
                            });
                            window.location.href = BASE_URL + "StoreControls/deleteStocks/"+id;
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
            // window.location.href = BASE_URL +  "StoreControls/deleteStocks";
        }

    </script> -->
</body>
</html>
