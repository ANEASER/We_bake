<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Vehicle</title>
</head>
<body style="font-weight: 800">
    <h1 class="header">Vehicles</h1>
    <div class="container">
        <div class="sub-container navbar">
            <a style="padding: 2% 40% 2% 40%; background-color: #BAA484; text-decoration: none; color: black;" onclick="back()">Back</a>
        </div>

        <div>
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
    </script>
</body>
</html>
           