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
        }    input[type=number],
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

    .bluebutton , .redbutton
    {
        margin-top: 5px;
        height: 40px;
    }

    @media screen and (max-width: 600px) {
        .content {
            flex-direction: column;
        
        }
    }
</style>
</head>
<body>
    <?php include 
        "adminnav.php";
    ?>
    
    <section style="display:flex;justify-content:space-around; width:100%">
        <section class="cart">
            
            <div>
                
                     <form id="reqestform" style="width: 90%;">
                    <h1 style="text-align:center;margin-bottom:15px; margin-top:15px">Add Raw Materials</h1>
                        <div id="showitem">
                            <div style="display: flex;flex-direction:row; justify-content:center">
                                <input type="hidden" name="itemid[]" value="<?php echo $maxitemid ; ?>">
                                <label for="itemcode">Raw Item</label>
                                <select name="itemcode[]" id="itemcode">
                                    <?php
                                        foreach ($stockitems as $stockitem) {
                                            echo "<option value='" . $stockitem->Name . "'>" . $stockitem->Name . "</option>";
                                        }?>
                                </select>
                                <?php print_r($stockitem->UnitOfMeasurement); ?>
                                <input type="hidden" name="unitofmeasure[]" value="<?php echo $stockitem->UnitOfMeasurement ; ?>">
                                <label for="quantity">Quantity</label>
                                <input type="number" id="quantity" name="quantity[]" step="0.01" min="0" required>
                                <button class="bluebutton" id="add">add row</button>
                            </div>
                        </div>
                    <button class="greenbutton" type="submit" class="btn" style="width: 100%; margin-top:20px">Add</button>
                </form>
               
            </div>
        </section>


    </section>
                                     
        <script>

            $(document).ready(function(){
                $("#add").click(function(e){
                   e.preventDefault();
                   $("#showitem").prepend(`<div style="display: flex;flex-direction:row">
                                                <input type="hidden" name="uniqueid[]" value="<?php echo $unique_id ; ?>">
                                                <label for="itemcode">Raw Item</label>
                                                <select name="itemcode[]" id="itemcode">
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
            });

            $(document).on('click', '#remove', function(e){
                e.preventDefault();
                $(this).parent('div').remove();
            });

            $("#reqestform").submit(function(e){
                e.preventDefault();
                var formdata = $("#reqestform").serialize();

                $.ajax({
                    type: "POST",
                    url: "<?php echo BASE_URL; ?>PmControls/InstertRawMaterialRequest",
                    data: formdata,
                    success: function(data){
                        location.reload();
                    }
                });
            });
            
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

            function more(unique_id){
                window.location.href = BASE_URL + "OrderControls/moreDetails/" + unique_id;
            }
            
        </script>
    
</body>
</html>
           