<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
        <li><a class="navbutton" onclick="home(this)">Customer Orders</a></li>
        <li><a class="navbutton" onclick="logout()">Log Out</a></li>
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

        function changeActiveLink(link) {
            var links = document.querySelectorAll('body nav ul li a');
            links.forEach(function (el) {
                el.classList.remove('active');
            });

            link.classList.add('active');

            sessionStorage.setItem('activeLink', link.getAttribute('onclick'));
        }

        function home(link){
            changeActiveLink(link);
            window.location.href = BASE_URL + "BillingControls/index";
        }

        function logout() {
            window.location.href = BASE_URL + "CommonControls/logout";
        }

    </script>
</body>
</html>