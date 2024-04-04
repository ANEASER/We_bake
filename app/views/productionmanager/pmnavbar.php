<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title></title>
</head>
<body>
   <nav>
    <input type="checkbox" id="check" name=""value="">
    <label for="check" class="checkbutn container" onclick="changemobilemode(this)">
        <div class="bar1"><i id="sidebar btn"></i></div>
        <div class="bar2"><i id="sidebar btn"></i></div>
        <div class="bar3"><i id="sidebar btn"></i></div>
        <div class="bar3"><i id="sidebar btn"></i></div>
    </label>

    <?php 
    echo '<img class="logo" src=".BASE_URL.'media/uploads/Content/logo.png" width="200">';
    ?>

    <ul>
    <li><a class="navbutton" onclick="home(this)">Home </a></li>
    <li><a class="navbutton" onclick="loadVehicles(this)">Vehicles</a></li>
    <li><a class="navbutton" onclick="logout()">LogOut</a></li>
    </ul>

    </nav>

    <script>

    var BASE_URL="<?php echo BASE_URL; ?>";

    var activeLink=sessionStorage.getlItem("activeLink");
    if(activeLink!=null){
        var linkElement= document.querySelector('a[onclick="'+activeLink+'"]');
        if(linkElement!=null){
            linkElement.classList.add('active');
        }
    }
    else{
        var homeLink=document.querySelector('a[onclick="home(this)"]');
        if(homeLink!=null){
            homeLink.classList.add('active');
            sessionStorage.setlItem('activeLink',homeLink.getAttribute('onclick'));
        }
    }
    function changeActive(link){
        vae links=document.query.SelectorAll('body nav ul a');
        links.forEach(function(el){
            el.classList.remove('active');
        });
        link.classList.add('active');
        sessionStorage.setlItem('activeLink',link.getAttribute('onclick'));
    }

    function home(link){
        changeActive(link);
        window.location.href= BASE_URL+"PmControls/index";
    }

    function loadvehicle(link){
        changeActive(link);
        window.loaction.href= BASE_URL + "PmComtrols/loadVehiclesView";
    }

    function logout(){
        window.location.href= BASE_URL + "CommonControls/logout";
    }

    </script>

</body>
</html>