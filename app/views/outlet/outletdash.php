<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outlet Manager</title>
    
    <link rel="stylesheet" href="http://localhost/we_bake/app/views/outlet/outletmanager.css">
</head>
<body>
    <div class="navbar">
    <h1 class="dashboard"> Outlet Manager Dashboard</h1>
            <ul>
                <li><button onclick = "PlaceOrder()">Place Order</button></li>
                <li><button onclick = "PurchaseHistory()">Purchase History</button></li>
                <li><button onclick = "EditContainOrder()">Edit Contain Order</button></li>
                <li><button onclick = "EditProfile()">Edit Profile</button></li>
            </ul>
    </div>
 <div class="content">
 <h1>Outlet Dash</h1>
        <div>
        <table>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>2</th>
            </tr>
        
        <tr>
            <td>1</td>
            <td>2</td>
            <td><button onclick="window.location.href='updatesupplier.php'">click</button></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td><button onclick="window.location.href='updatesupplier.php'">click</button></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td><button onclick="window.location.href='updatesupplier.php'">click</button></td>
        </tr>
        </table>

        </div>        
    </div>

    

    <div class="content">
 <h1>Last Purchases</h1>
        <div>
        <table>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>2</td>
            </tr>
        
        <tr>
            <td>1</td>
            <td>2</td>
            <td>2</td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>2</td>
        </tr>
       
        </table>

        </div>        
    </div>
    
    <script>

            function PlaceOrder() {
                window.location.href = "http://localhost/we_bake/public/outletControls/placeorder"};

            function PurchaseHistory() {
                window.location.href = "http://localhost/we_bake/public/outletControls/purchasehistory"};

            function EditContainOrder() {
                window.location.href = "http://localhost/we_bake/public/outletControls/editcontainorder"};

            function EditProfile() {
                window.location.href = "http://localhost/we_bake/public/outletControls/editprofile"};
        
</script>
    
</body>
</html>   





