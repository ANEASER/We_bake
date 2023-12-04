
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/storemanager/smstyle.css">
    <title>Store Manager_ Suppliers</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Suppliers</h1>
        <div class="suppdash">
            <button class="formbutton" onclick="addSuppliers()">Add New Suppliers</button>
        </div>
        <div>
        <table>
            <tr>
                <th>Supplier Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Place order</th>
            </tr>
            
        <!-- <tr>
            <td>Supplier 1</td>
            <td>0771234567</td>
            <td>Address 1</td>
            <td>email1@email.com</td>
            <td>4</td>
            <td><button class="formbutton" onclick="updateSuppliers()">Update</button></td>
            <td><button class="formbutton" onclick="window.location.href='deletesupplier.php'">Delete</button></td>
            <td><button class="formbutton" onclick="window.location.href='requestsupplier.php'">Place order</button></td>
        </tr> -->

        <?php
        foreach ($data as $val) {
            echo "<tr>
        <td>".$val->name."</td>
            <td>".$val->contactno."</td>
            <td>".$val->address."</td>
            <td>".$val->email."</td>
            <td>".$val->Ratings."</td>
            <td><button class='formbutton' onclick=\"updateSuppliers(".$val->id.")\">Update</button></td>
            <td><button class='formbutton' onclick=\"deleteSuppliers(".$val->id.")\">Delete</button></td>
            <td><button class='formbutton' onclick=\"window.location.href='requestsupplier.php'\">Request</button></td>
        </tr>";
         }
         ?>
        
        
        </table>

        </div>        
    </div>
    <script>

// getSupplierData();
        function addSuppliers() {
            window.location.href = "../StoreControls/addSupplier";
        }

        function updateSuppliers(id) {
            window.location.href = "../StoreControls/updateSupplier/id/"+id;
        }
        function getSupplierData() {
            window.location.href = "../StoreControls/getSupplierData";
        }

        function deleteSuppliers(id) {
            window.location.href = "../StoreControls/deleteSupplierData/id/"+id;
        }

    </script>
</body>
</html>
