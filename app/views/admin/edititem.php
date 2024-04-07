<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Edit Product Item</title>
</head>
<body>
    
    
    <?php
        include "adminnav.php";
        if (isset($error)) {
            echo "<script>
                const showAlert = async () => {
                    const SwalwithButton = Swal.mixin({
                        customClass: {
                            confirmButton: 'greenbutton',
                        },
                        buttonsStyling: false
                    });
    
                    if (typeof Swal !== 'undefined') {
                        await SwalwithButton.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '$error',
                            confirmButtonText: 'OK',
                        });
                        window.location.href = '" . BASE_URL . "AdminControls/AddItem';
    
                    } else {
                        alert('$error');
                    }
                };
    
                // Call the async function to show the alert
                showAlert();
            </script>";
        }
    ?>
     <section>
        <div class="form-container">
            <form method="POST" class="form" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>AdminControls/editproduct" onsubmit="return validateForm()">

                <input type="hidden" name="id" value="<?php echo $data[0]->itemid; ?>">

                <div class="form-group">
                    <label for="itemname">Item Name:</label>
                    <input type="text" id="itemname" name="itemname" placeholder="<?php echo $data[0]->itemname; ?>">
                </div>

                <div class="form-group">
                    <label for="retailprice">Retail Price:</label>
                    <input type="number" id="retailprice" name="retailprice" min="1" placeholder="<?php echo $data[0]->retailprice; ?>">
                </div>

                <div class="form-group">
                    <label for="stockprice">Cost:</label>
                    <input type="number" id="cost" name="cost" min="1" placeholder="<?php echo $data[0]->cost; ?>">
                </div>

                <div class="form-group">
                    <label for="stockprice">Items per Container</label>
                    <input type="number" id="cost" min="1" name="ipc" placeholder="<?php echo $data[0]->ipc; ?>" >
                </div>

                <div class="form-group">
                    <label for="itemdescription">Item Description:</label>
                    <textarea id="itemdescription" name="itemdescription" rows="4" placeholder="<?php echo $data[0]->itemdescription; ?>"></textarea>
                    <p id="charCount" style="font-size: 10px;">Characters remaining: 250</p>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <option value="<?php echo $data[0]->category; ?>" selected><?php echo $data[0]->category; ?></option>
                        <option value="Bread">Bread</option>
                        <option value="Pastries">Pastries</option>
                        <option value="Cakes">Cakes</option>
                        <option value="Cookies">Cookies</option>
                        <option value="Muffins">Muffins</option>
                        <option value="Doughnuts">Doughnuts</option>
                        <option value="Pies">Pies</option>
                        <option value="Buns">Buns</option>
                        <option value="Rolls">Rolls</option>
                        <option value="Sandwiches">Sandwiches</option>
                        <option value="Pizza">Pizza</option>
                        <option value="Others">Others</option>
                        <option value="Specials">Specials</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="availability">Availability:</label>
                    <select id="availability" name="availability">
                        <option value="<?php echo $data[0]->availability; ?>" selected>
                            <?php 
                            if($data[0]->availability == 1) {
                                echo "Available";
                            } else if ($data[0]->availability == 0) {
                                echo "Not Available";
                            } 
                            ?>
                        </option>
                        <?php
                        if($data[0]->availability == 1) {
                            echo "<option value='0'>Not Available</option>";
                        } else {
                            echo "<option value='1'>Available</option>";
                        } 
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Item Image</label>
                    <input type="file" name="image" id="image">
                </div>

                <input class="bluebutton" type="submit" value="Submit">

            </form>
        </div>
    </section>

    <script>
        function validateForm() {
            var retailPrice = document.getElementById('retailprice').value;
            var stockPrice = document.getElementById('cost').value;
            var itemDescription = document.getElementById('itemdescription').value;

            if (parseFloat(stockPrice) >= parseFloat(retailPrice)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Stock price cannot be greater than or equal to retail price',
                    confirmButtonText: 'OK',
                });
                return false;
            }

            if (itemDescription.length > 250) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Item description cannot exceed 250 characters',
                    confirmButtonText: 'OK',
                });
                return false;
            }

            return true; // allow form submission
        }

        document.getElementById('itemdescription').addEventListener('input', function () {
            var charCount = 250 - this.value.length;
            document.getElementById('charCount').innerText = 'Characters remaining: ' + charCount;
        });
    </script>

</body>
</html>
