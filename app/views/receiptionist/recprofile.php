<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <h1 style="background-color:Lightbrown;">Receptionist Dashboard</h1>
    <title>Profile</title>
</head>
  
  <body>
    <?php
        include "recnavbar.php";
    ?>

    <h1>Profile</h1>
    
     <section style="display:flex;justify-content:space-around; padding-top:3%; width:100%">

     <?php
     echo '<table>';

     echo '<tr>
     <th>ORDER REF</th>
     <th>DELIVERY DATE</th>
     <th class="hideonmobile">DELIVERY ADDRESS</th>
     <th class="hideonmobile">DELIVERY STATUS</th>
     <th class="hideonmobile">ORDER STATUS</th>
     <th class="hideonmobile">PAYMENT STATUS</th>
     <th>TOTAL</th>
     <th>MORE</th>
     </tr>';

     foreach($orders as $order){
        echo '<tr>';
        echo '<td>' . $order->orderref. '</td>';
        echo '<td>' . $order->orderdate . '</td>';
        echo '<td class="hideonmobile">' . $order->deliver_address . '</td>';
        echo '<td class="hideonmobile">' . $order->deliverystatus . '</td>';
        echo '<td class="hideonmobile">' . $order->orderstatus . '</td>';
        echo '<td class="hideonmobile">' . $order->paymentstatus . '</td>';
        echo '<td>' . $order->total . '</td>';
        echo "<td><button class='bluebutton' onclick='more(\"" . $order->unique_id . "\")'>More</button></td>";
        echo '</tr>';
        
    }
    echo '</table>';
         ?>

        </section>
    
     <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function dashboard(){
            window.location.href = BASE_URL + "Recieptioncontrols/index";
        }

        function more(unique_id){
            window.location.href = BASE_URL + "Recieptioncontrols/moredetails/" + unique_id;
        }
     </script>

</body>
</html>
