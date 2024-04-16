<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/profile.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">

    <title>Customer Profile</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>

    <button id="profilebutton" type="button" onclick="viewProfile()"></button>
    <button id="dashboardbutton" type="button" onclick="viewDashboard()"></button>

    <style>
        .pagination-container {
            text-align: center;
            margin-top: 10px; /* Adjust as needed */
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 4px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .swal2-actions {
            width: 50%;
            display: flex;
            justify-content: space-between;
        }

    </style>

        <section class="content" style="height: 120vh; width:100vw">
                <section class="dashboard" >
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
                        <div class="statscard" style="color:darkblue">
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
                        <div class="statscard" style="color:brown">
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
                    
                </section>

                <br>
                <h1 style="text-align: center;color:darkblue">Most Purchaced Items</h1>
                <section class="stats" style="display:flex;padding: 1%;">
                        <?php
                            if(is_array($mostPurchasedItems) && !empty($mostPurchasedItems)){
                                foreach($mostPurchasedItems as $item){
                                            echo "<div class='statscard' style='position: relative; background-image: url(" . BASE_URL . 'media/uploads/Product/' . $item->Link . "); background-size: cover; background-repeat: no-repeat; background-position: center;'>";
                                                echo "<div style='position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.7); display:flex;flex-direction:column;justify-content:center; font-weight:bolder' ";
                                                    echo "<h4>".$item->Name."</h4>";
                                                    echo "<h4>".$item->ItemCode."</h4>";
                                                    echo "<h4>".$item->Quantity."</h4>";
                                                echo "</div>";
                                            echo "</div>";
                                        
                                    }} else {
                                        echo "<h3 style='text-align:center;'>No Purchased Items</h3>";
                            }
                        ?>                        
                </section>
                

                <section class="pendingorderstable" style="display:flex;justify-content:space-around; padding-top:3%; width:100%;">
                    <?php
                        $itemsPerPage = 5;
                        $totalOrders = count($orders);
                        $totalPages = ceil($totalOrders / $itemsPerPage);

                        $currentPage = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

                        $startIndex = ($currentPage - 1) * $itemsPerPage;
                        $endIndex = min($startIndex + $itemsPerPage, $totalOrders);

                        echo '<div class="table-container">';
                        echo '<table>';
                        echo '<tr>
                            <th>ORDER REF</th>
                            <th>DELIVERY DATE</th>
                            <th class="hideonmobile">DELIVERY STATUS</th>
                            <th class="hideonmobile">PAYMENT STATUS</th>
                            <th>TOTAL</th>
                            <th>CANCEL</th>
                            <th>MORE</th>
                        </tr>';

                        for ($i = $startIndex; $i < $endIndex; $i++) {
                            $order = $orders[$i];

                                if($order->orderstatus != "cancelled" && $order->orderstatus != "finished"){
                                    echo '<tr>';
                                    echo '<td>' . $order->orderref. '</td>';
                                    echo '<td>' . $order->orderdate . '</td>';
                                    echo '<td class="hideonmobile">' . $order->deliverystatus . '</td>';
                                    echo '<td class="hideonmobile">' . $order->paymentstatus . '</td>';
                                    echo '<td>' . $order->total . '</td>';
                                    if ($order->orderstatus == "pending") {
                                        echo "<td><button class='redbutton' onclick='cancel(\"" . $order->unique_id . "\")'>Cancel</button></td>";
                                    } else {
                                        echo "<td>Not Available</td>";
                                    }
                                    echo "<td><button class='bluebutton' onclick='more(\"" . $order->unique_id . "\")'>More</button></td>";
                                    echo '</tr>';
                                }
                        }

                        echo '</table>';
                    ?>
                    <?php
                        // Pagination links
                        echo '<div class="pagination-container">';
                        echo '<div class="pagination">';
                        for ($page = 1; $page <= $totalPages; $page++) {
                            echo '<a class="brownbutton" href="?page=' . $page . '">' . $page . '</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                    ?>

                </section>
                
        </section>
        <section class="profile" style="font-weight: bolder; padding-left:3%">
                    <h1 style="font-size:1.5em;text-align:center"><span id="greeting"></span><td>  <?php echo $_SESSION["USER"]->UserName ?></td></h1>
                    <br>
                    <br>
                    <?php 
                        if(isset($_SESSION["USER"]->profilepic)){
                            $profilePic = $_SESSION["USER"]->profilepic;
                            if (base64_decode($profilePic, true) !== false) {
                                echo "<img src='data:image/jpeg;base64," . $profilePic . "' height=200px width=170px onclick='enlargeImage(this)'>";
                            } else {
                                echo "Invalid base64 encoded image.";
                            }
                        } else {
                            echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmRLRMXynnc7D6-xfdpeaoEUeon2FaU0XtPg&usqp=CAU' style='border-radius: 80px' alt='propic' height='100px' width='100px'>";
                        }
                    ?>
                    <p></p><br>
                    <table>
                        <tr>
                            <td><?php echo $_SESSION["USER"]->Name; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION["USER"]->Address; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION["USER"]->contactNo; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION["USER"]->Email; ?></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <section class="buttongroup">
                            <button class="brownbutton" onclick="editprofiledetails()" class="buttonedit">Edit Profile Details</button>

                            <button class="brownbutton" onclick="uploadprofilepic()">Edit Profile Picture</button>

                            <button class="brownbutton" onclick="changepassword()" class="buttonedit">Change Password</button>

                            <button class="brownbutton" onclick="logout()">Log Out</button>
                    </section>
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

        const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "yellowbutton2",
                        cancelButton: "yellowbutton2"
                    },
                    buttonsStyling: false
                });

        SwalwithButton.fire({
            text: "Are you sure you want to logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Logout",
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                text: "Logged out successfully",
                icon: "success",
                timer : 1000,
                showConfirmButton: false,
                }).then(() => {
                    sessionStorage.clear(); // Unset session storage
                    window.location.href = BASE_URL +  "CommonControls/logout";
                });
            }
            });
    }
    
    function updateGreeting() {
            var currentTime = new Date();
            var currentHour = currentTime.getHours();
            var greetingElement = document.getElementById('greeting');

            if (currentHour >= 5 && currentHour < 12) {
                greetingElement.textContent = 'Good Morning!';
            } else if (currentHour >= 12 && currentHour < 18) {
                greetingElement.textContent = 'Good Afternoon!';
            } else {
                greetingElement.textContent = 'Good Evening!';
            }
    }

    function more(unique_id){
            window.location.href = BASE_URL + "OrderControls/moredetails/" + unique_id;
    }

    function viewProfile() {
            console.log('view profile');
            var profileSection = document.querySelector('.profile');
            var dashboardSection = document.querySelector('.dashboard');
            var profileButton = document.getElementById('profilebutton');
            var dashboardButton = document.getElementById('dashboardbutton');

            profileSection.style.display = 'flex';
            dashboardSection.style.display = 'none';
            profileButton.style.display = 'none';
            dashboardButton.style.display = 'block';
    }

    function viewDashboard() {
            console.log('view dashboard');
            var profileSection = document.querySelector('.profile');
            var dashboardSection = document.querySelector('.dashboard');
            var profileButton = document.getElementById('profilebutton');
            var dashboardButton = document.getElementById('dashboardbutton');

            profileSection.style.display = 'none';
            dashboardSection.style.display = 'block';
            profileButton.style.display = 'block';
            dashboardButton.style.display = 'none';
    }

    var previousWidth = window.innerWidth;

    function checkAndRefresh() {
        var currentWidth = window.innerWidth;

        if (currentWidth > 1100 && currentWidth !== previousWidth) {
            location.reload(true);
        }

        // Update the previousWidth variable
        previousWidth = currentWidth;
    }

    function cancel(unique_id){
            const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "redbutton",
                        cancelButton: "yellowbutton",
                    },
                    buttonsStyling: false
                });
            
            SwalwithButton.fire({
                    text: "Are you sure you want to cancel this order?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Cancel",
                    cancelButtonText: "Keep",
                    reverseButtons: true,
                    preConfirm: async () => {
                        try {
                            await SwalwithButton.fire({
                                title: "Cancelled!",
                                text: "Your order has been canceled.",
                                icon: "success",
                                confirmButtonText: "OK",
                                confirmButtonClass: "greenbutton"
                            });
                            window.location.href = BASE_URL +"CustomerControls/cancelorder/" + unique_id;
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
    }

    function uploadprofilepic(){
        window.location.href = BASE_URL + "CustomerControls/uploadprofilepicview";
    }

    window.addEventListener('resize', checkAndRefresh);

    window.onload = checkAndRefresh;

    updateGreeting();

    setInterval(updateGreeting, 60000);

    </script>
</body>
</html>