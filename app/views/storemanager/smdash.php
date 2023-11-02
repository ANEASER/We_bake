<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/storemanager/smstyle.css">
    <title>Store Manager</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <!-- Nav not visible -->
    <p>Hello</p>

    <div class="content">
            <!--<div class="tile">
                <button class="dashbutton" onclick="loadSuppliers()"> Suppliers </button>
                
            </div>
            <div class="tile">
                <button class="dashbutton" onclick="loadStocks()"> Stocks </button>
                
            </div>-->
            <h1>Stocks</h1>
    <table style="border-collapse: collapse; width: 100%;">
        <tr style="background-color: #FF8080; color: white;">
            <th style="padding: 10px;">ID</th>
            <th style="padding: 10px;">Name</th>
            <th style="padding: 10px;">Minimum</th>
            <th style="padding: 10px;">Critical</th>
            <th style="padding: 10px;">Available</th>
            <th style="padding: 10px;">Unit</th>
            <th style="padding: 10px;">Expiry Date</th>
            <th style="padding: 10px;">Supplier</th>
            <th style="padding: 10px;">Item Code</th>
        </tr>
        <tr style="background-color: #FF8080;">
            <td style="padding: 10px;">1</td>
            <td style="padding: 10px;">Product A</td>
            <td style="padding: 10px;">10</td>
            <td style="padding: 10px;">2</td>
            <td style="padding: 10px;">15</td>
            <td style="padding: 10px;">Units</td>
            <td style="padding: 10px;">2023-12-31</td>
            <td style="padding: 10px;">Supplier 1</td>
            <td style="padding: 10px;">ABC123</td>
        </tr>
        <tr style="background-color: #FF8080;">
            <td style="padding: 10px;">2</td>
            <td style="padding: 10px;">Product B</td>
            <td style="padding: 10px;">8</td>
            <td style="padding: 10px;">3</td>
            <td style="padding: 10px;">20</td>
            <td style="padding: 10px;">Units</td>
            <td style="padding: 10px;">2024-06-15</td>
            <td style="padding: 10px;">Supplier 2</td>
            <td style="padding: 10px;">DEF456</td>
        </tr>
        <tr style="background-color: #FF8080;">
            <td style="padding: 10px;">3</td>
            <td style="padding: 10px;">Product C</td>
            <td style="padding: 10px;">5</td>
            <td style="padding: 10px;">1</td>
            <td style="padding: 10px;">10</td>
            <td style="padding: 10px;">Kgs</td>
            <td style="padding: 10px;">2023-11-20</td>
            <td style="padding: 10px;">Supplier 3</td>
            <td style="padding: 10px;">GHI789</td>
        </tr>
        <tr style="background-color: #FFFF80;">
            <td style="padding: 10px;">7</td>
            <td style="padding: 10px;">Product G</td>
            <td style="padding: 10px;">8</td>
            <td style="padding: 10px;">2</td>
            <td style="padding: 10px;">12</td>
            <td style="padding: 10px;">Units</td>
            <td style="padding: 10px;">2024-05-05</td>
            <td style="padding: 10px;">Supplier 7</td>
            <td style="padding: 10px;">STU456</td>
        </tr>
        <tr style="background-color: #FFFF80;">
            <td style="padding: 10px;">8</td>
            <td style="padding: 10px;">Product H</td>
            <td style="padding: 10px;">10</td>
            <td style="padding: 10px;">3</td>
            <td style="padding: 10px;">18</td>
            <td style="padding: 10px;">Lbs</td>
            <td style="padding: 10px;">2024-08-20</td>
            <td style="padding: 10px;">Supplier 8</td>
            <td style="padding: 10px;">VWX123</td>
        </tr>
        <tr style="background-color: #FFFF80;">
            <td style="padding: 10px;">9</td>
            <td style="padding: 10px;">Product I</td>
            <td style="padding: 10px;">5</td>
            <td style="padding: 10px;">1</td>
            <td style="padding: 10px;">9</td>
            <td style="padding: 10px;">Kgs</td>
            <td style="padding: 10px;">2023-09-10</td>
            <td style="padding: 10px;">Supplier 9</td>
            <td style="padding: 10px;">YZA987</td>
        </tr>
        <tr style="background-color: white;">
            <td style="padding: 10px;">4</td>
            <td style="padding: 10px;">Product D</td>
            <td style="padding: 10px;">12</td>
            <td style="padding: 10px;">4</td>
            <td style="padding: 10px;">18</td>
            <td style="padding: 10px;">Lbs</td>
            <td style="padding: 10px;">2024-03-10</td>
            <td style="padding: 10px;">Supplier 4</td>
            <td style="padding: 10px;">JKL987</td>
        </tr>
        <tr style="background-color: white;">
            <td style="padding: 10px;">5</td>
            <td style="padding: 10px;">Product E</td>
            <td style="padding: 10px;">6</td>
            <td style="padding: 10px;">2</td>
            <td style="padding: 10px;">14</td>
            <td style="padding: 10px;">Units</td>
            <td style="padding: 10px;">2024-09-25</td>
            <td style="padding: 10px;">Supplier 5</td>
            <td style="padding: 10px;">MNO123</td>
        </tr>
        <tr style="background-color: white;">
            <td style="padding: 10px;">6</td>
            <td style="padding: 10px;">Product F</td>
            <td style="padding: 10px;">15</td>
            <td style="padding: 10px;">3</td>
            <td style="padding: 10px;">21</td>
            <td style="padding: 10px;">Kgs</td>
            <td style="padding: 10px;">2023-10-15</td>
            <td style="padding: 10px;">Supplier 6</td>
            <td style="padding: 10px;">PQR789</td>
        </tr>        
    </table>
    </div>
   
    <script>

        function loadSuppliers() {
            window.location.href = "StoreControls/viewSupplier";
        }

        function loadStocks() {
            window.location.href = "StoreControls/viewStocks";
        }
    </script>
</body>
</html>
