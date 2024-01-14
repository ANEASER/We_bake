<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/profile.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Customer Profile</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>

    <section class="content">
            <section class="dashboard">
                <section class="stats">
                    <div class="statscard">
                        <h3>Pending Orders</h3>
                        
                        <?php
                            $pendingorders = 0;
                            foreach($orders as $order){
                                if($order->orderstatus == "pending"){
                                    $pendingorders = $pendingorders + 1;
                                }
                            }
                            echo "<p>".$pendingorders."</p>";
                        ?>
                    </div>
                    <div class="statscard">
                        <h3>Completed Orders</h3>
                        <?php
                            $completedorders = 0;
                            foreach($orders as $order){
                                if($order->orderstatus == "finished"){
                                    $completedorders = $completedorders + 1;
                                }
                            }
                            echo "<p>".$completedorders."</p>";?>
                    </div>
                    <div class="statscard">
                        <h3>Cancelled Orders</h3>
                        <?php
                            $cancelledorders = 0;
                            foreach($orders as $order){
                                if($order->orderstatus == "cancelled"){
                                    $cancelledorders = $cancelledorders + 1;
                                }
                            }
                            echo "<p>".$cancelledorders."</p>";?>
                    </div>

                    <div class="statscard">
                        <h3>Total Orders</h3>
                        <?php
                            $totalorders = 0;
                            foreach($orders as $order){
                                $totalorders = $totalorders + 1;
                            }
                            echo "<p>".$totalorders."</p>";?>
                    </div>
                    
                    <div class="statscard">
                        <h3>Total Purchasings (Rs)</h3>
                        <?php
                            $totalpurchasings = 0;
                            foreach($orders as $order){
                                $totalpurchasings = $totalpurchasings + $order->total;
                            }
                            echo "<p>".$totalpurchasings."</p>";?>
                    </div>

                    <div class="statscard">
                        <h3>Total units</h3>
                        <?php
                        $totalunits = array_sum($itemQuantities);
                        echo "<p>".$totalunits."</p>";?>
                    </div>
                    
                
            </section>
            <h1 style="text-align: center;">Most Purchaced Items</h1>
            <section style="display:flex;padding: 1%;">
                <?php
                        if(is_array($mostPurchasedItems) && !empty($mostPurchasedItems)){
                        foreach($mostPurchasedItems as $item){
                                echo "<div class='statscard' style='background-image:url(" . BASE_URL . 'media/uploads/Product/' . $item->Link . ")'>";
                                echo "<h4>".$item->Name."</h4>";
                                echo "<h4>".$item->ItemCode."</h4>";
                                echo "<h4>".$item->Quantity."</h4>";
                                echo "</div>";
                            }} else {
                                echo "<h3 style='text-align:center;'>No Purchased Items</h3>";
                            }
                ?>
            </section>
    </section>
            <section class="profile" style="font-weight: bolder;">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmRLRMXynnc7D6-xfdpeaoEUeon2FaU0XtPg&usqp=CAU" style="border-radius: 80px;"  alt="propic" height="200px" width="200px">
                <p></p><br>
                <table>
                    <tr>
                        <td>Customer Username </td>
                        <td><?php echo $_SESSION["USER"]->UserName ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $_SESSION["USER"]->Name; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $_SESSION["USER"]->Address; ?></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><?php echo $_SESSION["USER"]->contactNo; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $_SESSION["USER"]->Email; ?></td>
                    </tr>
                </table>
                <section class="buttongroup">
                        <button class="brownbutton" onclick="editprofiledetails()" class="buttonedit">Edit Profile Details</button>

                        <button class="brownbutton" onclick="changepassword()" class="buttonedit">Change Password</button>

                        <button class="brownbutton" onclick="logout()">Log Out</button>
                </section>
    </section>
    
    <script>
    
    var BASE_URL = "<?php echo BASE_URL; ?>";
    
    function editprofiledetails(){
                window.location.href = BASE_URL + "CustomerControls/editprofiledetailsview";
    }
    function changepassword(){
                window.location.href = BASE_URL + "CustomerControls/changepasswordview";
    }

    function logout() {
            sessionStorage.clear(); // Unset session storage
            window.location.href = BASE_URL +  "CommonControls/logout";
    }
    </script>
</body>
</html>