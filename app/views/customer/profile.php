<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/profile.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">

    <title>Customer Profile</title>
</head>
<style>
    .editsection {
                width: 74%;
                display: flex;
                flex-direction: row;
                margin: 2% 3% 3% 3%;
                background-color: antiquewhite;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                color: rgb(95, 37, 37);
                margin-left: 13%;
            }
</style>
<body>
    <?php
        include 'customernav.php';
    ?>

    <style>
        .swal2-actions {
            width: 50%;
            display: flex;
            justify-content: center;
        }

        #profilecard{
            width:100%; padding-left:3%;display:flex;flex-direction:row;padding:2%;justify-content:flex-start
        }

    </style>
     <section class="editsection">
        <div id="profilecard" >
            <div>
                <?php 
                if(isset($_SESSION["USER"]->profilepic)){
                    $profilePic = $_SESSION["USER"]->profilepic;
                    if (base64_decode($profilePic, true) !== false) {
                        echo "<img src='data:image/jpeg;base64," . $profilePic . "' height=300px width=255px onclick='enlargeImage(this)'>";
                    } else {
                        echo "Invalid base64 encoded image.";
                    }
                } else {
                    echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmRLRMXynnc7D6-xfdpeaoEUeon2FaU0XtPg&usqp=CAU' style='border-radius: 80px' alt='propic' height='100px' width='100px'>";
                }
                ?>
            </div>
            <br>
            <table style="text-align: left; margin-left:5%;font-size:1.5em; border-collapse: collapse;font-weight:bolder">
                <tr>
                    <td style="padding: 10px;">Name  :  </td>
                    <td style="padding: 10px;"><?php echo $_SESSION["USER"]->Name; ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Address  :  </td>
                    <td style="padding: 10px;"><?php echo $_SESSION["USER"]->Address; ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Contact  :  </td>
                    <td style="padding: 10px;"><?php echo $_SESSION["USER"]->contactNo; ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px;">Email  :  </td>
                    <td style="padding: 10px;"><?php echo $_SESSION["USER"]->Email; ?></td>
                </tr>
            </table>

            <br>
        
        </div>
    </section>
    <section class="editsection">
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
    </section>
    <section class="editsection">
    <section class="stats" style="padding: 1%;z-index:0">
                        <?php
                            if(is_array($mostPurchasedItems) && !empty($mostPurchasedItems)){
                                foreach($mostPurchasedItems as $item){
                                            echo "<div class='statscard' style='background-image: url(" . BASE_URL . 'media/uploads/Product/' . $item->Link . "); background-size: cover; background-repeat: no-repeat; background-position: center;'>";
                                                echo "<div style='top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.7); display:flex;flex-direction:column;justify-content:center; font-weight:bolder' ";
                                                    echo "<h4>".$item->Name."</h4>";
                                                    echo "<h4>".$item->Quantity."</h4>";
                                                echo "</div>";
                                            echo "</div>";
                                        
                                    }} else {
                                        echo "<h3 style='text-align:center;'>No Purchased Items</h3>";
                            }
                        ?>                        
                </section>
    </section>
    <script>
    
    var BASE_URL = "<?php echo BASE_URL; ?>";
    

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