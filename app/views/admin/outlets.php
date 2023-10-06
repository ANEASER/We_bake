<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Outlet</title>
</head>
<body style="font-weight: 800">
    <h1 class="header">Outlets</h1>
    <div class="container">
        <div class="sub-container navbar">
            <button class="navbutton" onclick="back()">Back</button>
            <button class="navbutton" onclick="add()">Add</button>
        </div>

        <div class="sub-container content">
            <table>
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                        <th>Column 4</th>
                        <th>Column 5</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1, Column 1</td>
                        <td>Row 1, Column 2</td>
                        <td>Row 1, Column 3</td>
                        <td>Row 1, Column 4</td>
                        <td>Row 1, Column 5</td>
                    </tr>
                    <tr>
                        <td>Row 2, Column 1</td>
                        <td>Row 2, Column 2</td>
                        <td>Row 2, Column 3</td>
                        <td>Row 2, Column 4</td>
                        <td>Row 2, Column 5</td>
                    </tr>
                    <tr>
                        <td>Row 3, Column 1</td>
                        <td>Row 3, Column 2</td>
                        <td>Row 3, Column 3</td>
                        <td>Row 3, Column 4</td>
                        <td>Row 3, Column 5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function back() {
            window.location.href = "../AdminControls";
        }

        function add() {
            window.location.href = "../AdminControls/addOutlet";
        }
    </script>

</body>
</html>
           