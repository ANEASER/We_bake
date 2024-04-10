<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
    
    <title></title>
</head>
<body>
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
            <li style="font-weight: bolder;"><a onclick="profile(this)"><?php if(isset($_SESSION["USER"]->role)){echo $_SESSION["USER"]->role;}else{ echo $_SESSION["USER"]->UserName;}?></a></li>
            
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
        

    </script>
</body>
</html>