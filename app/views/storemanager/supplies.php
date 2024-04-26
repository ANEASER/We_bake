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

    <section style="width: 100%; padding:1%">
        <div style="display: flex; flex-direction:row; justify-content:space-between; margin-bottom:2%">
            <form method="GET" action="<?php echo BASE_URL; ?>StoreControls/SearchSupply" style="display: flex; flex-direction:row;">
                <?php
                    if(isset($_GET['search'])) {
                        echo '<input type="text" id="search" name="search" placeholder="Supply ID,Item ID or Invoice No" value="' . $_GET['search'] . '" class="searchbox">';
                        echo '<input class="searchbutton" style="margin-right:1%" type="submit" value="Search">';
                        echo '<button class="searchbutton" onclick="clearSearch(); return false;">Clear Search</button>';
                    } else {
                        echo '<input type="text" id="search" name="search" placeholder="Supply ID,Item ID or Invoice No" class="searchbox">';
                        echo '<input class="searchbutton" type="submit" value="Search">';
                }?>
            </form>
        </div>
    </section>

    <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure 
        if (count($supplies) > 0){
            echo '<table style="width:90%">';
            echo '<tr>
                    <th> Supply ID </th>
                    <th> Stock Item ID </th>
                    <th> Stock Item Name </th>
                    <th> Delivered Date</th>
                    <th> Invoice Number</th>
                    <th> Expiry date</th>
                    <th> Delivered Quantity</th>
                    

                    <th> Update</th>
                    <th> Delete</th>
                </tr>';

                foreach($supplies as $supplies){
                    echo '<tr>';
                    echo '<td>' . $supplies->CustomSupplyID . '</td>';
                    echo '<td>' . $supplies->CustomStockItemID . '</td>';
                    echo '<td>' . $supplies->StockItemName . '</td>';
                    echo '<td>' . $supplies->DeliveredDate . '</td>';
                    echo '<td>' . $supplies->InvoiceNo . '</td>';
                    echo '<td>' . $supplies->ExpiryDate . '</td>';
                    echo '<td>' . $supplies->DeliveredQuantity . '</td>';
                    echo '<td> <button class="yellowbutton" onclick="updateSupply(' . $supplies->SupplyID . ')">Update</button></td>';
                    echo '<td class="hideonmobile"><button class="redbutton" onclick="deleteSupply(' . $supplies->SupplyID . ')">Delete</button></td>';
                    echo '</tr>';

                }
            echo '</table>';

        }

        else{
            echo '<h3> No supply records available </h3>';
        }
        
    ?>
    </section>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function search() {
            var query = document.getElementById('search').value;
            window.location.href = BASE_URL + "StoreControls/SearchSupply?search=" + encodeURIComponent(query);
        }

        function clearSearch() {
            window.location.href = BASE_URL + "StoreControls/loadSuppliesView";
        }

        function updateSupply(id) {
            window.location.href = BASE_URL +  "StoreControls/updateSuppliesView/"+id;
        }

        function deleteSupply(id) {
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
                            window.location.href = BASE_URL + "StoreControls/deleteSupplies/"+id;
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
        }

    </script>
</body>
</html>
