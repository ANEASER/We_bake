<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<div>

                
                <form id="reqestform" style="width: 90%;">
                    <h1 style="text-align:center;margin-bottom:15px; margin-top:15px">Raw Materials Request</h1>
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
                                <input type="hidden" name="unitofmeasure[]" value="<?php echo $stockitem->UnitOfMeasurement ; ?>">
                                <label for="quantity">Quantity</label>
                                <input type="number" id="quantity" name="quantity[]" step="0.01" min="0" required>
                                <button class="bluebutton" id="add">add row</button>
                            </div>
                        </div>
                    <button class="greenbutton" type="submit" class="btn" style="width: 100%; margin-top:20px">Request</button>
                </form>
           
        </div>
    </section>


</section>
                                 
    <script>

        $(document).ready(function(){
            $("#add").click(function(e){
               e.preventDefault();
               $("#showitem").prepend(`<div style="display: flex;flex-direction:row">
                                            <input type="hidden" name="itemid[]" value="<?php echo $maxitemid ; ?>">
                                            <label for="itemcode">Raw Item</label>
                                            <select name="itemcode[]" id="itemcode">
                                                <?php
                                                    foreach ($stockitems as $stockitem) {
                                                        echo "<option value='" . $stockitem->Name . "'>" . $stockitem->Name . "</option>";
                                                    }?>
                                            </select>
                                            <input type="hidden" name="unitofmeasure[]" value="<?php echo $stockitem->UnitOfMeasurement ; ?>">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" id="quantity" name="quantity[]" min="0" step="0.01" required>
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
                url: "<?php echo BASE_URL; ?>AdminControls/addRaws",
                data: formdata,
                success: function(data){
                    console.log(data);
                }
            });
        });
        </script>
</body>
</html>