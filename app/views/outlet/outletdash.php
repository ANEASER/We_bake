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
                <th>Order ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>view Order</th>

            </tr>
        <tr>
            <td>011#</td>
            <td>200 Tea Buns</td>
            <td> LKR 14,000/=</td>
            <td><button >View</button></td>
        </tr>
        <tr>
            <td>123#</td>
            <td>20 Cup Cakes</td>
            <td>LKR 1000/=</td>
            <td><button>View</button></td>
        </tr>
        <tr>
            <td>527#</td>
            <td>100 Breads</td>
            <td>LKR 12,00/=</td>
            <td><button>View</button></td>
        </tr>
        </table>

        </div>        
    </div>

    
    <div class="content">
 <h1>Last Purchases</h1>
        <div>
        <table>

        <tr>
                <th>Order ID</th>
                <th>Date</th>

            </tr>
        
            <tr>
                <td>001</td>
                <td>2023.10.05</td>
                
            </tr>
        
        <tr>
            <td>002</td>
            <td>2023.10.25</td>
            
        </tr>
        <tr>
            <td>003</td>
            <td>2023.10.15</td>
            </tr>

            <tr>
            <td>004</td>
            <td>2023.10.25</td>
            </tr>

            <tr>
            <td>005</td>
            <td>2023.10.25</td> 
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

