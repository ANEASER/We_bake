<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/storemanager/smstyle.css">
    <title>Store Manager_Stocks</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Stocks</h1>

        <div class="suppdash">
            <button class="formbutton" onclick="addStockItem()">Add New Stock Item</button>
        </div>
        <div>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Available Amount</th>
                <th>No. of Units</th>
                <th>Expire Date</th>
                <th>Supplier</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
    
            <tr>
            <td>Item 1</td>
            <td>100</td>
            <td>75</td>
            <td>10/3/2024</td>
            <td>Nimal</td>
            <td><button class="formbutton" onclick="updateStocks()">Update</button></td>
            <td><button class="formbutton" onclick="deleteStocks()">Delete</button></td>
            </tr>

            <tr>
            <td>Item 2</td>
            <td>500</td>
            <td>50</td>
            <td>10/3/2024</td>
            <td>Kamal</td>
            <td><button class="formbutton" onclick="updateStocks()">Update</button></td>
            <td><button class="formbutton" onclick="deleteStocks()">Delete</button></td>
            </tr>

            <tr>
            <td>Item 3</td>
            <td>850</td>
            <td>10</td>
            <td>10/3/2024</td>
            <td>Hasitha</td>
            <td><button class="formbutton" onclick="updateStocks()">Update</button></td>
            <td><button class="formbutton" onclick="deleteStocks()">Delete</button></td>
            </tr>

            <tr>
            <td>Item 4</td>
            <td>200</td>
            <td>5</td>
            <td>10/3/2024</td>
            <td>Sunil</td>
            <td><button class="formbutton" onclick="updateStocks()">Update</button></td>
            <td><button class="formbutton" onclick="deleteStocks()">Delete</button></td>
            </tr>
        </table>

        </div>       
            
    </div>
    <script>

        function addStockItem() {
            window.location.href = "../StoreControls/addStockItem";
        }

        function updateStocks() {
            window.location.href = "../StoreControls/updateStocks";
        }

        function deleteStocks() {
            window.location.href = "../StoreControls/deleteStocks";
        }

    </script>
</body>
</html>
