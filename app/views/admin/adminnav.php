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
            <li><a onclick="home(this)">Home</a></li>
            <li><a onclick="laodItems(this)">Items</a></li>
            <li><a onclick="loadOutlets(this)">Outlets</a></li>
            <li><a onclick="loadStocks(this)">Stocks</a></li>
            <li><a onclick="loadUsers(this)">Users</a></li>
            <li><a onclick="advertiesments(this)">Advertiesments</a></li>
            <li><a onclick="logout(this)">logout</a></li>
            
        </ul>
    </nav>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        var activeLink = sessionStorage.getItem('activeLink');
        if (activeLink === null || activeLink === undefined || activeLink === "logout(this)") {
            var homeLink = document.querySelector('a[onclick="home(this)"]');
            if (homeLink) {
                homeLink.classList.add('active');

            sessionStorage.setItem('activeLink', homeLink.getAttribute('onclick'));
        }
        } else {
            console.log(activeLink);
            var linkElement = document.querySelector('a[onclick="' + activeLink + '"]');
            if (linkElement) {
                linkElement.classList.add('active');
            } 
        }

        
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
        function home(link) {
            changeActive(link);
            window.location.href = BASE_URL + "AdminControls/loadAdminDash";
        }
        
        function laodItems(link) {
            changeActive(link);
            window.location.href = BASE_URL + "CommonControls/loadProductsView";
        }

        function loadOutlets(link) {
            changeActive(link);
            window.location.href = BASE_URL + "AdminControls/loadOutletsView";
        }
        
        function loadStocks(link) {
            changeActive(link);
            window.location.href = BASE_URL + "AdminControls/loadStocksView";
        }

        function loadUsers(link) {
            changeActive(link);
            window.location.href = BASE_URL + "AdminControls/loadUsersView";
        }

        function advertiesments(link) {
            changeActive(link);
            window.location.href = BASE_URL + "AdminControls/AddAdvertiesment";
        }

        function logout(link) {
            changeActive(link);
            window.location.href = BASE_URL + "CommonControls/logout";
        }

    </script>
</body>
</html>