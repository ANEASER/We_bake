<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
</head>
<body>

    <?php
        include "adminnav.php";

        if (isset($error)){
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$error',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$error');
            }
          </script>";}
        elseif (isset($message)){
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '$message',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$message');
            }
          </script>";}
    ?>

<section style="display:flex;justify-content:space-around; width:100%; padding:1%">
    <?php 
       $half_count = count($deliverycharges) / 2;

       $first_half = array_slice($deliverycharges, 0, $half_count);
       $second_half = array_slice($deliverycharges, $half_count);
       
       echo "<table><tr><td>";
       echo "<table>";
       echo "<tr><th>Charge ID</th><th>City</th><th>Cap 10</th><th>Cap 80</th><th>Cap 300</th><th>Cap 1000</th></tr>";
       foreach ($first_half as $charge) {
           echo "<tr>";
           echo "<td>" . $charge->charge_id . "</td>";
           echo "<td>" . $charge->city . "</td>";
           echo "<td>" . $charge->cap_10 . "</td>";
           echo "<td>" . $charge->cap_80 . "</td>";
           echo "<td>" . $charge->cap_300 . "</td>";
           echo "<td>" . $charge->cap_1000 . "</td>";
           echo "</tr>";
       }
       echo "</table></td><td>";
       echo "<table>";
       echo "<tr><th>Charge ID</th><th>City</th><th>Cap 10</th><th>Cap 80</th><th>Cap 300</th><th>Cap 1000</th></tr>";
       foreach ($second_half as $charge) {
           echo "<tr>";
           echo "<td>" . $charge->charge_id . "</td>";
           echo "<td>" . $charge->city . "</td>";
           echo "<td>" . $charge->cap_10 . "</td>";
           echo "<td>" . $charge->cap_80 . "</td>";
           echo "<td>" . $charge->cap_300 . "</td>";
           echo "<td>" . $charge->cap_1000 . "</td>";
           echo "</tr>";
       }
       echo "</table></td></tr></table>";
    ?>
</section>
<section>

    <div class="form-container" style="max-width: 1200px;">
        <h2>Update Delivery Charges</h2>
        <br>
        <form class="form" action="<?php echo BASE_URL; ?>AdminControls/updateDeliveryCharges" method="post">
            <div style="display: flex; align-items: center;justify-content:space-around">
                <label for="city">Select City:</label>
                <select name="city" id="city" style="width: 300px;">
                    <option value="Dehiwala">Dehiwala</option>
                    <option value="Nugegoda">Nugegoda</option>
                    <option value="Rajagiriya">Rajagiriya</option>
                    <option value="Battaramulla">Battaramulla</option>
                    <option value="Kotte">Kotte</option>
                    <option value="Malabe">Malabe</option>
                    <option value="Kohuwala">Kohuwala</option>
                    <option value="Pamankada">Pamankada</option>
                    <option value="Wellawatte">Wellawatte</option>
                    <option value="Bambalapitiya">Bambalapitiya</option>
                    <option value="Kirulapone">Kirulapone</option>
                    <option value="Kolonnawa">Kolonnawa</option>
                    <option value="Ethul Kotte">Ethul Kotte</option>
                    <option value="Maharagama">Maharagama</option>
                    <option value="Nawala">Nawala</option>
                </select>
                <label for="cap_10">Cap 10:</label>
                <input type="number" name="cap_10" id="cap_10"  style="width: 80px;">
                <label for="cap_80">Cap 80:</label>
                <input type="number" name="cap_80" id="cap_80"  style="width: 80px;">
                <label for="cap_300">Cap 300:</label>
                <input type="number" name="cap_300" id="cap_300"  style="width: 80px;">
                <label for="cap_1000">Cap 1000:</label>
                <input type="number" name="cap_1000" id="cap_1000"  style="width: 80px;">
                <button style="margin-left:2%"  class="searchbutton" type="submit">Update Charges</button>
            </div>
        </form>
    </div>


</section>

</body>
</html>
