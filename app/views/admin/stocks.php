<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Stock</title>
</head>
<body style="font-weight: 800">
   
    
    <?php
        include "adminnav.php"
    ?>

        <div class="sub-container content">
        <table style="border-collapse: collapse; width: 100%; margin-left:-5%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Minimum</th>
                <th>Critical</th>
                <th>Available</th>
                <th>Unit</th>
                <th>Expiry Date</th>
                <th>Supplier</th>
                <th>Item Code</th>
                <th>Update</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Product A</td>
                <td>10</td>
                <td>5</td>
                <td>20</td>
                <td>Pieces</td>
                <td>2023-12-31</td>
                <td>Supplier 1</td>
                <td>ABC123</td>
                <td><button class="formbutton1" onclick="edit()">Update</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Product B</td>
                <td>15</td>
                <td>8</td>
                <td>12</td>
                <td>Boxes</td>
                <td>2024-05-15</td>
                <td>Supplier 2</td>
                <td>XYZ789</td>
                <td><button class="formbutton1" onclick="edit()">Update</button></td>
            </tr>
            </table>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/AdminControls";   
        }

        function edit() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/EditStock";
        }
    </script>
</body>
</html>
           