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
    <title>Raw Materials Request</title>
</head>
<body>
    
    <style>

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
    <?php
    require('pmnavbar.php');
    ?>
    <section class="content" style="display: flex; flex-direction:row">
            <section class="cart" style="padding : 2%;font-size: 1em;">
                <h1 style="text-align:center;">Tomorrow Production</h1>
                <?php
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
                    ?>
        </section>
        
        <section class="cart" style="padding : 2%;font-size: 1em; margin-left : 10px;">
            <?php 
                if($placedstockorder != null){
                    echo "<h1 style='text-align:center;'>Stock Order</h1>";
                    echo "<table>";
                    echo "<tr>
                            <th>Item Code </th>
                            <th>Quantity</th>
                        </tr>";

                    foreach ($stockorderlines as $stockorderline) {
                        
                        echo "<tr>";
                        echo "<td>" . $stockorderline->RawName	 . "</td>";
                        echo "<td>" . $stockorderline->quantity . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            ?>
            <div>
                
                    <form id="reqestform" style="width: 90%;">
                        <h1 style="text-align:center;margin-bottom:15px; margin-top:15px">Raw Materials Request</h1>
                            <div id="showitem">
                                <div style="display: flex;flex-direction:row; justify-content:center">
                                    <input type="hidden" name="uniqueid[]" value="<?php echo $unique_id ; ?>">
                                    <label for="itemcode">Raw Item</label>
                                    <select name="itemcode[]" id="itemcode">
                                        <?php
                                            foreach ($stockitems as $stockitem) {
                                                echo "<option value='" . $stockitem->Name . "'>" . $stockitem->Name . "</option>";
                                            }?>
                                    </select>
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quantity" name="quantity[]" required>
                                    <button class="bluebutton" id="add">add row</button>
                                </div>
                            </div>
                        <button class="greenbutton" type="submit" class="btn" style="width: 100%; margin-top:20px">Request</button>
                    </form>
               
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                                                <label for="quantity">Quantity</label>
                                                <input type="number" id="quantity" name="quantity[]" required>
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
            
            
        </script>
    </section>
</body>
</html>
           