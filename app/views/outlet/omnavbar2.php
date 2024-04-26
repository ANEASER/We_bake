<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
            <li><a onclick="placeorder(this)">Place Order</a></li>
            <li><a onclick="purchasehistory(this)">Purchase History</a></li>
            <li><a onclick="logout(this)">logout</a></li>
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
                window.location.href = BASE_URL + "outletControls";
        }
        function placeorder(link){
            changeActive(link);
                window.location.href = BASE_URL + "outletControls/placeorder";
        }
        function purchasehistory(link){
            changeActive(link);
                window.location.href = BASE_URL + "outletControls/purchasehistory";
        }
        function logout(){
                window.location.href = BASE_URL + "commonControls/logout";
        }
</script>

</body>
</html>
