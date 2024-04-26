<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
    
    <title></title>
</head>
<body>
    <style>
     
            .dropdown-menu {
                display: none; 
                position: absolute;
                background-color: #fff; 
                border-radius: 4px; 
                z-index: 1; 
                width: 200px;
                right: 0;
            }


            .dropdown-toggle {
                cursor: pointer; 
            }
            

            .dropdown:hover .dropdown-menu {
                display: flex;
                flex-direction: column;
            }

            ul {
                line-height: 30px;
            }

            .dropdown-menu p {
                padding: 0 0 0 10px;
                text-decoration: none;
                display: block;
                background-color: #f9f9f9;
                border-bottom: 1px solid #f1f1f1;
            }

            .swal2-actions {
                width: 100% !important;
                display: flex;
                flex-direction: row;
                justify-content: center;
            }

            @media screen and (max-width: 1100px){
                .dropdown:hover .dropdown-menu {
                    display: flex;
                    flex-direction: column;
                    justify-content: center; /* Center vertically */
                    align-items: center; /* Center horizontally */
                    position: absolute;
                    background-color: #fff;
                    border-radius: 4px;
                    z-index: 1;
                    width: 200px;
                    right: 50%; /* Push it to the center */
                    transform: translateX(50%); /* Adjust position */
                }
            }

    </style>
    <nav>
        <input type="checkbox" id="check" name="" value="">
        <label for="check" class="checkbtn container" onclick="changemobilemode(this)">
            <div class="bar1"> <i id="sidebar_btn"></i> </div>
            <div class="bar2"> <i id="sidebar_btn"></i> </div>
            <div class="bar3"> <i id="sidebar_btn"></i> </div>
        </label>
        <?php
            echo '<img class="logo" src="' . BASE_URL . 'media/uploads/Content/logo.png" width="200px">';
        ?>
        <ul>
            <li><a onclick="home(this)">Home</a></li>
            <li><a onclick="placeorder(this)">Place order</a></li>
            <li><a onclick="purchasehistory(this)">Purchase History</a></li>
            <li><a onclick="makeinquiry(this)">Make Inquiry</a></li>
            <li style="font-weight: bolder;" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                            echo $_SESSION["USER"]->UserName;
                        ?>
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <p onclick="profile(this)">Profile</p>
                    <p onclick="editprofiledetails(this)">Edit Profile</p>
                    <p onclick="logout(this)">Logout</p>
                </div>
            </li>
            
        </ul>
    </nav>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        var activeLink = sessionStorage.getItem('activeLink');
        if (activeLink) {
            var linkElement = document.querySelector('a[onclick="' + activeLink + '"]');
            if (linkElement) {
                linkElement.classList.add('active');
            } 
        } else {
            var homeLink = document.querySelector('a[onclick="home(this)"]');
            if (homeLink) {
                homeLink.classList.add('active');

            sessionStorage.setItem('activeLink', homeLink.getAttribute('onclick'));
        }}
        
        function changeActive(link) {
            var links = document.querySelectorAll('body nav ul li a');
            links.forEach(function (el) {
                el.classList.remove('active');
            });

            link.classList.add('active');

            sessionStorage.setItem('activeLink', link.getAttribute('onclick'));
        }

        
        function changemobilemode(x) {
            x.classList.toggle("change");
        }
           

        // navigate to pages
        function home(link){
                changeActive(link);
                window.location.href = BASE_URL + "CustomerControls";
        }
        function profile(link){
                changeActive(link);
                window.location.href = BASE_URL + "CustomerControls/profile";
        }
        function purchasehistory(link){
                changeActive(link);
                window.location.href = BASE_URL + "CustomerControls/purchasehistory";
        }
        function makeinquiry(link){
                changeActive(link);
                window.location.href = BASE_URL + "CustomerControls/makeinquiryview";
        }
        function placeorder(link){
                changeActive(link);
                window.location.href = BASE_URL + "OrderControls/placeorder";
        }
        function editprofiledetails(){
                window.location.href = BASE_URL + "CustomerControls/editprofiledetailsview";
        }

        function logout() {

            const SwalwithButton = Swal.mixin({
                        customClass: {
                            confirmButton: "yellowbutton",
                            cancelButton: "yellowbutton"
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

        function uploadprofilepic(){
            window.location.href = BASE_URL + "CustomerControls/uploadprofilepicview";
        }

    </script>
</body>
</html>