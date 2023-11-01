<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Item</title>
</head>
<body style="font-weight: 800">
   
    <div class="container">
        <div class="navbar">
            <h1>Items</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <div class="suppdash">
                <button class="formbutton" onclick="add()">Add New Products</button>
            </div>

            <div>
            <table>
                <tr>
                    <th>Item ID</th>
                    <th>Retail Price</th>
                    <th>Stock Price</th>
                    <th>Item Description</th>
                    <th>Update</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>10</td>
                    <td>5</td>
                    <td>Product A - Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td><button class="formbutton" onclick="edit()">Update</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>15</td>
                    <td>8</td>
                    <td>Product B - Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                    <td><button class="formbutton" onclick="edit()">Update</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>20</td>
                    <td>12</td>
                    <td>Product C - Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</td>
                    <td><button class="formbutton" onclick="edit()">Update</button></td>
                </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        function back() {
            window.location.href = "../AdminControls";
        }

        function add() {
            window.location.href = "../AdminControls/AddItem";
        }

        function edit() {
            window.location.href = "../AdminControls/EditItem";
        }
    </script>

</body>
</html>
           