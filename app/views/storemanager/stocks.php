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
        include "smnavbar.php";
    ?>

    <style>

        .pagination-container {
            text-align: center;
            margin-top: 10px; /* Adjust as needed */
            max-width: 620px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 4px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

    </style>

    <section style="width: 100%; padding:1%">
        <div class="content">
            <h1>Stocks</h1>
            
        </div>
    </section>

    <section style="width: 100%; padding:1%">
        <div style="display: flex; flex-direction:row; justify-content:space-between; margin-bottom:2%">
            <form method="GET" action="<?php echo BASE_URL; ?>StoreControls/SearchItem" style="display: flex; flex-direction:row;">
                <?php
                    if(isset($_GET['search'])) {
                        echo '<input type="text" id="search" name="search" placeholder="Item ID,Type or Name" value="' . $_GET['search'] . '" class="searchbox">';
                        echo '<input class="searchbutton" style="margin-right:1%" type="submit" value="Search">';
                        echo '<button class="searchbutton" onclick="clearSearch(); return false;">Clear Search</button>';
                    } else {
                        echo '<input type="text" id="search" name="search" placeholder="Item ID,Type or Name" class="searchbox">';
                        echo '<input class="searchbutton" type="submit" value="Search">';
                }?>
            </form>

            <section class="buttongroup">
                <button style="width: 200px;" type="submit"  class="bluebutton" onclick="addStockItem(this)">Add New Stocks</button>
            </section>

        </div>
    </section>


    <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure
        $itemsPerPage = 12;
        $totalStocks = count($stocks);
        $totalPages = ceil($totalStocks / $itemsPerPage);
        $currentPage = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $endIndex = min($startIndex + $itemsPerPage, $totalStocks);


            echo '<div class="table-container">'; //The table structure
            echo '<table style="width:105%">';
            echo '<tr>
                    <th> Item ID </th>
                    <th> Name </th>
                    <th> Item Type </th>
                    <th> Unit of Measurement</th>
                    <th> Available Stock</th>
                    <th> Minimum Stock</th>
                    <th> Critical Stock</th>
                    <th> New Supply</th>
                    <th> Update</th>
                    <th> Delete</th>
                </tr>';


                foreach(array_slice($stocks, $startIndex, $itemsPerPage) as $stocks)
                {
                    $stockitem = new StockItem();
                    $stockitem = $stockitem->where('ItemID', $stocks->ItemID);
                    
                    echo '<tr>';
                    echo '<td>' . $stocks->CustomItemID . '</td>';
                    echo '<td>' . $stocks->Name . '</td>';
                    echo '<td>' . $stocks->Type . '</td>';
                    echo '<td>' . $stocks->UnitOfMeasurement . '</td>';
                    echo '<td>' . $stocks->AvailableStock . '</td>';
                    echo '<td>' . $stocks->MinimumStock . '</td>';
                    echo '<td>' . $stocks->CriticalStock . '</td>';
                    echo '<td> <button class="orangebutton" onclick="insertSupply(' . $stocks->ItemID . ')">Insert</button></td>';
                    echo '<td> <button class="yellowbutton" onclick="updateStocks(' . $stocks->ItemID . ')">Update</button></td>';
                    echo '<td class="hideonmobile"><button class="redbutton" onclick="deleteStocks(' . $stocks->ItemID . ')">Delete</button></td>';
                    echo '</tr>';

                }
            echo '</table>';

            echo '<br>';
            echo '<br>';

            echo '<div class="pagination-container">';
            echo '<div class="pagination">';

            if($currentPage > 1) {
                echo '<a href="' . BASE_URL . 'StoreControls/loadStocksView?page=' . ($currentPage - 1) . '">Previous</a>';
            }

            echo '<span> Page ' . $currentPage . ' of ' . $totalPages . '</span>';

            if($currentPage < $totalPages) {
                echo '<a href="' . BASE_URL . 'StoreControls/loadStocksView?page=' . ($currentPage + 1) . '">Next</a>';
            }
            
            echo '</div>';
            echo '</div>';

        

        
        
    ?>
    </section>

    
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function search() {
            var query = document.getElementById('search').value;
            window.location.href = BASE_URL + "StoreControls/SearchItem?search=" + encodeURIComponent(query);
        }

        function clearSearch() {
            window.location.href = BASE_URL + "StoreControls/loadStocksView";
        }

        function addStockItem() {
            window.location.href = BASE_URL +  "StoreControls/addStock";
        }

        function insertSupply(id) {
            window.location.href = BASE_URL +  "StoreControls/insertSupplyView/"+id;
        }

        function updateStocks(id) {
            window.location.href = BASE_URL +  "StoreControls/updateStocksView/"+id;
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

    </script>
</body>
</html>
