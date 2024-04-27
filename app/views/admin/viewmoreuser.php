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
        include "adminnav.php";
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
           
            <table style="width: 100%; border-collapse: collapse; font-size: 1.5em;">
                <tr>
                    <!-- Left half -->
                    <td style="width: 50%; padding: 10px; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="padding: 10px;">Name  :  </td>
                                <td style="padding: 10px;"><?php echo $data->Name; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">NIC  :  </td>
                                <td style="padding: 10px;"><?php echo $data->NIC; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">DOB  :  </td>
                                <td style="padding: 10px;"><?php echo $data->DOB; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">Contact  :  </td>
                                <td style="padding: 10px;"><?php echo $data->contactNo; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">Active State  :  </td>
                                <td style="padding: 10px;"><?php echo $data->ActiveState; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">Employee No  :  </td>
                                <td style="padding: 10px;"><?php echo $data->EmployeeNo; ?></td>
                            </tr>
                        </table>
                    </td>
                    <!-- Right half -->
                    <td style="width: 50%; padding: 10px; vertical-align: top;border-left:solid sandybrown 2px">
                        <table style="width: 100%;">
                            <tr>
                                <td style="padding: 10px;">Address  :  </td>
                                <td style="padding: 10px;"><?php echo $data->Address; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">User ID  :  </td>
                                <td style="padding: 10px;"><?php echo $data->UserID; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">Role  :  </td>
                                <td style="padding: 10px;"><?php echo $data->Role; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">Username  :  </td>
                                <td style="padding: 10px;"><?php echo $data->UserName; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">Email  :  </td>
                                <td style="padding: 10px;"><?php echo $data->Email; ?></td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>
            </table>

        
        </div>
    </section>
    
    </section>
    <script>
    

    



    </script>
</body>
</html>