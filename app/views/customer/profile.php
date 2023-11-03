<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
    <style>
        .homeisland {
            background: rgba(255, 183, 88, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(14.3px);
            -webkit-backdrop-filter: blur(14.3px);
            border: 1px solid rgba(255, 255, 255, 0.14);
        }
    </style>

</head>
<body style="font-family: 'Poppins', sans-serif;background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-large-display-of-bread-picture-image_2664293.jpg'); 
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            background-size: cover; ">
<!--<div class="header">
        <h1>Customer Profile</h1>
    </div>-->
    

        <?php
        include "sidebar.php"
        ?>
    
    <div class="sub-container" >
    <h1 style="text-align:center; color:#BAA484">My Profile</h1>
        <div>
            <div class="homeisland" style="margin:0 30% 0 30%; border:solid 1px  #BAA484; padding:10%; color:white;font-weight:bolder;font-size:large">
                <p>Username : <?php echo $data->UserName; ?></p>
                <p>Name : <?php echo $data->Name; ?></p>
                <p>Adress : <?php echo $data->Address; ?></p>
                <p>Email : <?php echo $data->Email; ?></p>
                <div>
                    <button onclick="editprofile()" class="buttonprofile">Edit Profile</button>
                </div>
            </div>
            
            
            
        </div>
<script>
    

    function editprofile(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/editprofile";
}
</script>
</body>
</html>