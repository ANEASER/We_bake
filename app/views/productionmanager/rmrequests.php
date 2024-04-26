<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Raw Materials Request</title>
    <style>
.cart1{
    width: 60vw; margin: auto ; display:flex;
    margin-top: 20px;
    flex-direction:column; 
    justify-content:space-around;
    background-color: rgba(245, 242, 242, 0.658);
    border-radius: 8px;
    padding: 5%;
}
.hover{
            display:flex;
            padding :8px;
}
        .button {
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none; 
            justify-content: center;
            align-items: right;
            font-size: 16px;
            border-radius: 9px;
        }
        .red {
            background-color: #e74c3c;
        }
        .green {
            background-color: #2ecc71;
        }
        .blue {
            background-color: #3498db;
        }
        .yellow{
            background-color: #f1c40f;
            margin-left: 10px;
        }
        
        
    input[type=number],
    select 
    {
        width: 20%;
        padding: 5px;
        margin: 5px;
    }
    label
    {
        margin-top: 5px;
        margin-left: 20px;
        width: 15%;
    }

    

    @media screen and (max-width: 600px) {
        .content {
            flex-direction: column;
        
        }
    }
</style>
</head>
<body>
    

    <?php
    require('pmnavbar.php');
    ?>

    <ul style="display: flex;margin-left:75%; margin-top:30px;">
    <ul style="display: flex; padding: 0; list-style: none; margin: 0;">
    <li style="margin-right: 10px;"><a class="hover"id="home" onclick="showrmRequestTable(this)">RawMaterialRequest</a></li>
    <li style="margin-right: 10px;"><a class="hover" onclick="showrmRequestHistoryTable(this)">RequestHistory</a></li>
    </ul>
    </ul>


  
<div style="display: flex; flex-direction: column;">

<!-- Raw Materials Requirements Request for tomorrow Before placed -->

<?php 
if ($placedstockorder == null) {
    echo '<section style="display:flex;justify-content:space-around;width:100%;">';
    //Production List
    echo  ' <section class="cart1" style="padding: 20px;">
    <h1 style="text-align:center;background-color: #41201f; color: #ffffff;">Tomorrow\'s Production List</h1>';
    echo "<br>";
    echo "<table>";
    echo "<tr>
            <th>Item Code </th>
            <th>Item Name</th>
            <th>Quantity</th>
        </tr>";

    foreach ($productorderlines as $productorderline) {
        
        $productitem = new ProductItem();
        $item = $productitem->where('Itemcode', $productorderline->Itemcode);
        
        echo "<tr>";
        echo "<td>" . $productorderline->Itemcode . "</td>";
        echo "<td>" . $item[0]->itemname. "</td>";
        echo "<td>" . $productorderline->quantity . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</section>";


    //Raw Materials Requirement
    echo '<section class="cart1" style="padding: 20px; margin-top: 20px;margin-left:10px;">';
    echo "<h1 style='text-align: center; background-color: #41201f; color: #ffffff;'>Raw Material Requirement Request</h1>";
    echo "<br>";
            echo "<table>
                <tr>
                    <th>Raw Name</th>
                    <th>Quantity</th>
                    <th>Unit of Measurement</th>
                </tr>";
            foreach ($autocalucalatedraws as $raw) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($raw["rawName"]) . "</td>";
                echo "<td>" . htmlspecialchars($raw["subtotalquantity"]) . "</td>";
                echo "<td>" . htmlspecialchars($raw["UnitOfMeasurement"]) . "</td>";
                echo "</tr>";
            }
            echo "</table>"; 
    echo "<br>";

    // Additional Raw Materials Request form
    echo "<form id='requestform' style='width: 100%;'>";
    echo "<h1 style='text-align: center; margin-bottom: 25px; margin-top: 15px;'>Additional Raw Materials Requirement</h1>";
   
    echo "<div id='showitem'>";
    echo "<div style='display: flex; flex-direction: row; justify-content: center;'>";
    echo "<input type='hidden' name='uniqueid[]' value='" . $unique_id . "'>";
    
    echo "<label for='itemcode'>Raw Item</label>";
    echo "<select name='itemcode[]' id='itemcode'>";
    echo "<option value=''>Select Item</option>";
    foreach ($stockitems as $stockitem) {
        echo "<option value='" . $stockitem->Name . "'>" . $stockitem->Name . "</option>";
    }
    echo "</select>";
    
    echo "<input type='hidden' name='unitofmeasure[]' value='<?php echo $stockitem->UnitOfMeasurement; ?>'>";
    
    echo "<label for='quantity'>Quantity</label>";
    echo "<input type='number' id='quantity' name='quantity[]'>";
    
    echo "<button class='button blue' id='add'>Add Item</button>";
   
    echo "</div>";
    echo "</div>";
   
    echo "<br>";
    
    echo "<textarea style='margin-left: 5%; width: 90%; color: #999;' name='comment' id='comment'>Additional comments to be placed</textarea>";
    
    echo "<button class='button green' type='submit' class='btn' style='width: 100%; margin-left: 3%; margin-top: 20px;'>Request</button>";
    
    echo "</form>";

    echo "</section>";
}

?>




<!-- Raw Materials Requirements Request for tomorrow after placed -->

<?php 
if ($placedstockorder != null) {
    echo ' <section style="display:flex;justify-content:space-around; width:100%;">';
    // Production List
    echo  ' <section class="cart1" style="padding: 20px;">
        <h1 style="text-align:center;background-color: #41201f; color: #ffffff;">Tomorrow\'s Production List</h1>';
    echo "<br>";
    echo "<table>";
    echo "<tr>
            <th>Item Code </th>
            <th>Item Name</th>
            <th>Quantity</th>
        </tr>";

    foreach ($productorderlines as $productorderline) {
        
        $productitem = new ProductItem();
        $item = $productitem->where('Itemcode', $productorderline->Itemcode);
        
        echo "<tr>";
        echo "<td>" . $productorderline->Itemcode . "</td>";
        echo "<td>" . $item[0]->itemname. "</td>";
        echo "<td>" . $productorderline->quantity . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    
    // Raw Material Requirement Request
       echo "<h1 style='text-align: center; margin-top: 30px; background-color: #41201f; color: #ffffff;'>Raw Material Requirement Request</h1>";
        echo "<br>";
            echo "<h1 style='text-align:center;color:green;'>Raw Materials Requirements Request Placed</h1>";
        echo "<br>";
        
    echo "</section>";

    // Raw Materials Requirement
    echo '<section class="cart1" style="padding: 20px; margin-left: 10px;">';
    echo "<h1 style='text-align: center; margin-bottom: 20px; background-color: #41201f; color: #ffffff;'>Tomorrow's Raw Materials Requirements</h1>";
    echo "<table>";
    echo "<tr>
            <th>Raw Name</th>
            <th>Quantity</th>
            <th>Unit of Measurement</th>
        </tr>";

    foreach ($stockorderlines as $stockorderline) {
        echo "<tr>";
        echo "<td>" . $stockorderline->RawName . "</td>";
        echo "<td>" . $stockorderline->quantity . "</td>";
        echo "<td>" . $stockorderline->UnitOfMeasurement . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<br>";

    // Additional Raw Materials Request
    echo "<form id='requestform' style='width: 100%;'>";
    echo "<h1 style='text-align:center;margin-bottom:25px; margin-top:15px;background-color: #41201f; color: #ffffff;'>Additional Raw Materials Requirement</h1>";
    echo "<div id='showitem'>";
    echo "<div style='display: flex;flex-direction:row; justify-content:center'>";
    
    echo "<input type='hidden' name='uniqueid[]' value='".$unique_id."'>";
    
    echo "<label for='itemcode'>Raw Item</label>";
    echo "<select name='itemcode[]' id='itemcode'>";
    echo "<option value=''>Select Item</option>";
    foreach ($stockitems as $stockitem) {
        echo "<option value='".$stockitem->Name."'>".$stockitem->Name."</option>";
    }
    echo "</select>";
    
    echo "<input type='hidden' name='unitofmeasure[]' value='".$stockitem->UnitOfMeasurement."'>";
    
    echo "<label for='quantity'>Quantity</label>";
    echo "<input type='number' id='quantity' name='quantity[]'>";
    
    echo "<button class='button blue' id='add'>Add Item</button>";
    
    echo "</div>";
    echo "</div>";
    echo "<br>";
    
    echo "<textarea style='margin-left:5%; width: 90%; color: #999;' name='comment' id='comment'>Additional comments to be placed</textarea>";

    echo "<button class='button green' type='submit' class='btn' style='width: 100%; margin-left:3%; margin-top:20px'>Request</button>";
    
    echo "</form>";

    echo "</section>";
}
?>
      
</div>
      
                    
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

$(document).ready(function(){
    $("#add").click(function(e){
        e.preventDefault();
        $("#showitem").prepend(`<div style="display: flex;flex-direction:row">
                                    <input type="hidden" name="uniqueid[]" value="<?php echo $unique_id ; ?>">
                                    <label for="itemcode">Raw Item</label>
                                    <select name="itemcode[]" id="itemcode">
                                        <option value="">Select Item</option>
                                        <?php
                                            foreach ($stockitems as $stockitem) {
                                                echo "<option value='" . $stockitem->Name . "'>" . $stockitem->Name . "</option>";
                                            }?>
                                    </select>
                                    <input type="hidden" name="unitofmeasure[]" value="<?php echo $stockitem->UnitOfMeasurement ; ?>">
                                    <?php print_r($stockitem->UnitOfMeasurement); ?>
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quantity"  min=0 name="quantity[]">
                                    <button class="redbutton"  id="remove">remove</button>
                                </div>`);
    });

    $(document).on('click', '#remove', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });

    $("#requestform").submit(function(e){
        e.preventDefault();
        var formdata = $("#requestform").serialize(); 
        const SwalwithButton = Swal.mixin({
            customClass: {
                confirmButton: "button yellow",
                cancelButton: "button yellow"
            },
            buttonsStyling: false
            });

            SwalwithButton.fire({
                text: "Are you sure you want to place the request?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Request Placed Successfully',
                        text: 'The raw materials request has been successfully placed.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo BASE_URL; ?>pmcontrols/InstertRawMaterialRequest",
                            data: formdata,
                            success: function(data){
                                location.reload();
                            },
                        });
                    });
                }
            });
    });
});


    function more(unique_id){
        window.location.href = BASE_URL + "OrderControls/moreDetails/" + unique_id;
    }
    //Active Link Functions           
    document.addEventListener('DOMContentLoaded', function () {

                console.log('DOMContentLoaded');
                var activeLink = sessionStorage.getItem('activeLink');
                console.log(activeLink);
                if (activeLink != "showrmRequestTable(this)" || activeLink != "showrmRequestHistoryTable(this)" || activeLink == null){
                    var homeLink = document.getElementById('home');
                    if (homeLink) {
                        homeLink.click();
                    }
                } else {
                    var linkElement = document.querySelector('a[onclick="' + activeLink + '"]');
                    if (linkElement) {
                        linkElement.classList.add('active');

                        var functionName = activeLink.match(/([a-zA-Z]+)\(/)[1];

                        if (typeof window[functionName] === 'function') {
                            window[functionName](linkElement);
                        }
                    }
                }
            });

    function changeActiveLink(link){
        var links = document.querySelectorAll("body div ul li a");
        links.forEach(function (el){
            el.classList.remove('active');
        });

        link.classList.add('active');

        sessionStorage.setItem('activeLink', link.getAttribute('onclick'));
    }

    function showrmRequestTable(link){
        changeActiveLink(link);
        document.getElementById("RMRequest").style.display = "block";
        document.getElementById("RMRequestHistory").style.display = "none";
    }
    function showrmRequestHistoryTable(link){
        window.location.href = BASE_URL + "pmcontrols/rmHistoryView";
    }

    
            
     </script>
    
</body>
</html>