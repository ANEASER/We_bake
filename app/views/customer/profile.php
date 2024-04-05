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

                        <div class="statscard">
                            <h3>Total units</h3>
                            <?php
                            $totalunits = array_sum($itemQuantities);
                            echo "<p>".$totalunits."</p>";?>
                        </div>
                        
                    
                </section>
                <h1 style="text-align: center;color:darkblue">Most Purchaced Items</h1>
                        <section style="display:flex;padding: 1%;">
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
        </section>
        <section class="profile" style="font-weight: bolder; padding-left:3%">
                    <h1 style="font-size:1.5em;text-align:center"><span id="greeting"></span><td>  <?php echo $_SESSION["USER"]->UserName ?></td></h1>
                    <br>
                    <br>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmRLRMXynnc7D6-xfdpeaoEUeon2FaU0XtPg&usqp=CAU" style="border-radius: 80px"  alt="propic" height="100px" width="100px">
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
    window.addEventListener('resize', checkAndRefresh);

    window.onload = checkAndRefresh;

    updateGreeting();

    setInterval(updateGreeting, 60000);

    </script>
</body>
</html>