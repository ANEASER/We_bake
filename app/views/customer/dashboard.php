<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { 
           margin-right: -10px;
           overflow-y: scroll; 
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
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg1.jpg') no-repeat center center fixed;
                background-size: cover;
                width: 100%;
                height: 350px;
        }

        .add-2-3 {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
        }

        .add-2, .add-3 {
                 width: 50%;
                 height: 400px;
                }


        .add-2{
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg2.jpg') no-repeat center center;
                background-size: cover;
                }

        .add-3{
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg3.jpg') no-repeat center center;
                background-size: cover;
                }

        @media only screen and (max-width: 600px) {

                .add-1 {
                display: block;
                background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg1m.jpg') no-repeat center center fixed;
                background-size: cover;
                height: 400px;
                width: 100%;
                }

                .add-2-3 {
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                }

                .add-2, .add-3 {
                        width: 100%;
                        height: 250px;
                }
        
                .add-2{
                        background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg2m.jpg') no-repeat center center fixed;
                        background-size: cover;
                }

                .add-3{
                        background: url('<?php echo BASE_URL ?>media/uploads/Advertiesments/bg3m.jpg') no-repeat center center fixed;
                        background-size: cover;
                }

        }
</style>

</head>
<body>
        <section class="adds">
               <section class="add-1">
               
               </section>
               <section class="add-2-3">
                        <section class="add-2">

                        </section>
                        <section class="add-3">

                        </section>
               </section>
        </section>
</body>
</html>
 