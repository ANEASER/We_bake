<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Dashboard</title>
    <style>
        body { 
           margin-right: -10px;
           overflow-y: scroll; 
           background-color: #ffe6bd;
           background-image: none;
        }

        body::-webkit-scrollbar {
                scrollbar-width: thin;
                scrollbar-color: #888 transparent;
        }

        body::-webkit-scrollbar-thumb {
        background-color: #888;
        }


        .adds{
                display: flex;
                flex-direction: column;
        }
        .add-1 {
                display: block;
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg1.jpg') no-repeat center center;
                background-size: cover;
                width: 100%;
                height: 100vh;
        }

        .add-2-3 {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
        }

        .add-2, .add-3 {
                 width: 50%;
                 height: 40vh; /* Adjusted to 40% of the viewport height */
                }


        .add-2{
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg2.jpg') no-repeat center center;
                background-size: cover;
                }

        .add-3{
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg3.jpg') no-repeat center center;
                background-size: cover;
                }

        h1{
               font-weight: bolder;
        }

        .footer-container {
                        padding: 20px; /* Add padding around the content */
                        text-align: center; /* Center-align the content */
                }

        .footer-logo img {
                        vertical-align: middle; /* Align the logo vertically */
                }

        .footer-links {
                        margin-top: 10px; /* Add some space between the logo and links */
                }

        .footer-links span {
                        cursor: pointer; /* Change cursor to pointer on hover */
                        margin: 0 10px; /* Add space between each link */
                }

        .footer-info {
                        margin-top: 20px; /* Add some space between links and info */
                        color: #6c757d; /* Text color for additional info */
                }

        .footer-info p {
                        margin: 5px 0; /* Add space between paragraphs */
                }

        .randomgenrated{
                display: flex;flex-direction:row;width:50%; justify-content:space-around
        }


        @media only screen and (max-width: 1100px) {

                .add-1 {
                display: block;
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg1m.jpeg') no-repeat center center;
                background-size: cover;
                height: 400px;
                width: 100%;
                }

                .add-2-3 {
                        display: flex;
                        flex-direction: column;
                        height: 60vh;
                }

                .add-2, .add-3 {
                        width: 100%;
                        height: 30vh; /* Adjusted to 30% of the viewport height */
                }
        
                .add-2{
                        background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg2m.jpg') no-repeat center center;
                        background-size: cover;
                }

                .add-3{
                        background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg3m.jpg') no-repeat center center;
                        background-size: cover;
                }

                .randomgenrated{
                        margin-top: 1%;
                        width: 100%;
                        height: 30vh; 
                        margin-bottom: 1%;
                }

        }
</style>



</head>
<body style="width: 100%;font-size:20px">
        <section class="adds" style="width: 100%;">
               <section class="add-1">
               </section>
               <div style="text-align: center;padding:3% 10% 3% 10%">
                        <h1>Our Story</h1>
                        <br>
                        <p>It all began with a passion for baking and a commitment to quality.
                           Our journey started in a humble kitchen, where the aroma of freshly baked breads and pastries filled the air.
                           With dedication and a relentless pursuit of perfection, we soon garnered a loyal following, 
                           leading us to expand and establish multiple outlets across Colombo.</p>
                </div>
               <section class="add-2-3">
                        <section class="add-2">

                        </section>
                        <div class="randomgenrated">
                                <?php
                                        if (is_array($mostPurchasedItems) && !empty($mostPurchasedItems)) {
                                                foreach ($mostPurchasedItems as $itemArray) {
                                                    foreach ($itemArray as $item) {
                                                        echo "<div onclick=\"selectCategory('" . $item->category . "')\" style='background-image: url(" . BASE_URL . 'media/uploads/Content/' . $item->category . ".jpg); background-size: cover; background-repeat: no-repeat; background-position: center;width:48%'>";
                                                        echo "</div>";
                                                    }
                                                }
                                            } else {
                                                echo "<h3 style='text-align:center;'>No Items</h3>";
                                            }
                                            
                                   ?>
                        </div>
               </section>
               
               <div style="text-align: center;padding:3% 10% 3% 10%">
                        <h1>Our Promise</h1>
                        <br>
                        <p>When you step into a We Bake outlet, you're not just entering a bakery you're stepping into a world of flavor, tradition, and community.
                        Whether you're picking up your morning coffee and croissant or selecting the perfect cake for a special occasion, 
                        our friendly staff is here to greet you with a smile and assist you every step of the way.</p>
                </div>

                <section class="add-2-3">
                        <div class="randomgenrated">
                        <?php
                                foreach ($latestaddeditems as $item) {
                                        $imagelink = $item->imagelink;
                                        // Now you can use $imagelink in your HTML output
                                        echo "<div style='background-image: url(" . BASE_URL . 'media/uploads/Product/' . $imagelink . "); background-size: cover; background-repeat: no-repeat; background-position: center;width:48%'>";
                                        echo "</div>";
                                    }
                        ?>

                        </div>
                        <section class="add-3">

                        </section>
               </section>
               <div style="text-align: center;padding:3% 10% 3% 10%">
                        <h1>Join Us</h1>
                        <br>
                        <p>Join us on our journey as we continue to spread happiness, one delicious treat at a time. 
                                From our family to yours, we invite you to experience the magic of Web Bake and create unforgettable memories with every bite.</p>
                        <p>Mail Us Your CV <span style="text-decoration: underline;"><u>career@webake.com</u></span></p>
                </div>
               <br>
               <hr style="border-top: 2px solid rgb(95, 37, 37); margin: 20px 0;"> 
               <div class="footer-container">
                        <div class="footer-links">
                                <span onclick="navigateTo('<?php echo BASE_URL; ?>')">Home</span> | 
                                <span onclick="navigateTo('/contact')">Contact Us</span> | 
                                <span onclick="navigateTo('/about')">About Us</span>
                        </div>
                        <div class="footer-info">
                                <p>&copy; <?php echo date('Y'); ?> We Bake. All rights reserved.</p>
                                <p>Designed and Developed by Group-IS04</p>
                        </div>
                </div>

        </section>
        <script>
        function selectCategory(category) {
                window.location.href = "<?php echo BASE_URL; ?>CommonControls/productitem/" + category;
            }
        </script>
</body>
</html>
 