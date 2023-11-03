<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Manager Dashboard</title>
    <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 10px 0;
            }

            table th {
                background-color: #bc9b72;
                color: white;
                font-weight: bold;
                text-align: left;
                padding: 10px;
            }

            table tr:nth-child(even) {
                background-color: #f2f2f2;
                
            }

            table tr {
                
                height:70%;
            }

            table td {
                padding: 8px;
                border: 1px solid #ddd;
            }

            table td[colspan="5"] {
                text-align: center;
                padding: 10px;
                color: #d9534f;
            }

            button {
                background-color: #bc9b72;
                color: white;
                padding: 10px 13px ;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                align-self: center;
            }
    </style>
</head>
<body>
    <div class="navbar">
    <h1 class="dashboard">Production Manager</h1>
        <ul>
            <li><button class="navbutton" onclick="loadVehicles()">Vehicles</button></li>
            <li><button class="navbutton" onclick="logout()">Log Out</button></li>
        </ul>
    </div>
    <div class="content">
    <div>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>view Order</th>

            </tr>
        <tr>
            <td>011#</td>
            <td>200</td>
            <td> LKR 14,000/=</td>
            <td><button >View</button></td>
        </tr>
        <tr>
            <td>123#</td>
            <td>20</td>
            <td>LKR 1000/=</td>
            <td><button>View</button></td>
        </tr>
        <tr>
            <td>527#</td>
            <td>200</td>
            <td>LKR 12,000/=</td>
            <td><button>View</button></td>
        </tr>
        </table>

        </div>        
    </div>        
    </div>
    <script>

        function loadVehicles() {
            window.location.href = "http://localhost/we_bake/public/pmControls/loadVehiclesView";
        }

        function logout() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/logout";
        }

    </script>
</body>
</html>