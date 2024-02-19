<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
</head>
<body>

    <?php
        include "adminnav.php"
    ?>

    <div style="padding: 2%; background-color:antiquewhite; margin:2%; display:flex; width:100% ; flex-wrap:wrap;justify-content:space-around">

        <div  class="day" style="width:100%;height:300px">
            <button class="daybutton" onclick="daily()">Daily</button>
            <button class="monthbutton" onclick="monthly()">Monthly</button>
            <canvas id="myChart1"></canvas>
        </div>

        <div  class="month" style="width:100%;height:300px">
            <button class="daybutton" onclick="daily()">Daily</button>
            <button class="monthbutton" onclick="monthly()">Monthly</button>
            <canvas id="myChart2"></canvas>
        </div>

        <div style="width:500px; margin:5%">
            <canvas id="myChart3"></canvas>
        </div>

        <div  style="width:500px; margin:5%" >
            <canvas id="myChart4"></canvas>
        </div>

        <div style="width:300px; margin:5%">
            <canvas id="myChart5"></canvas>
        </div> 

        <div style="width:300px; margin:2%">
            <form method="post">
            <label for="month">Select Month:</label>
                <select id="month" name="selected_month">
                    <option value="none">Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <button type="submit">Filter Orders</button>
            </form>
            <canvas id="myChart6"></canvas>
        </div> 

    </div>

    <?php
        $totalsByDay = [];
        $totalsByMonth = [];

        foreach ($producorderdata as $row) {
            $total = $row->total;
            $orderdate = $row->orderdate;

            if (array_key_exists($orderdate, $totalsByDay)) {
                $totalsByDay[$orderdate] += $total;
            } else {
                $totalsByDay[$orderdate] = $total;
            }
        }

        foreach ($producorderdata as $row) {
            $total = $row->total;
            $orderdate = $row->orderdate;
            $month = date('F', strtotime($orderdate));

            if (array_key_exists($month, $totalsByMonth)) {
                $totalsByMonth[$month] += $total;
            } else {
                $totalsByMonth[$month] = $total;
            }
        }

        $orderdates = array_keys($totalsByDay);
        $totals = array_values($totalsByDay);

        $orderdatesMonth = array_keys($totalsByMonth);
        $totalsMonth = array_values($totalsByMonth);
    ?>

    <?php

        $productquantities = [];
        $productsale = [];
        $productnames = [];

        foreach($productorderlinedata as $row) {

            foreach($productitemdata as $row1) {
                if ($row1->itemid == $row->itemid) {
                    $product = $row1->Itemcode;
                }
            }

            $quantity = $row->quantity;
            $sale = $row->totalprice;

            if (array_key_exists($product, $productquantities)) {
                $productquantities[$product] += $quantity;
                $productsale[$product] += $sale;
            } else {
                $productquantities[$product] = $quantity;
                $productsale[$product] = $sale;
            }
        }

    ?>

    <?php

        $orders = [];
        $orderCounts = [
            'processing' => 0,
            'pending' => 0,
            'finished' => 0,
            'cancelled' => 0,
            'ondelivery' => 0,
        ];

        $currentYear = date('Y');

        foreach ($producorderdata as $row) {
            $orderYear = date('Y', strtotime($row->orderdate));

            // Check if the order is from the current year
            if ($orderYear == $currentYear) {
                if ($row->orderstatus == 'processing') {
                    $orders[] = $row;
                    $orderCounts['processing']++;
                } elseif ($row->orderstatus == 'pending') {
                    $orders[] = $row;
                    $orderCounts['pending']++;
                } elseif ($row->orderstatus == 'finished') {
                    $orders[] = $row;
                    $orderCounts['finished']++;
                } elseif ($row->orderstatus == 'cancelled') {
                    $orders[] = $row;
                    $orderCounts['cancelled']++;
                } elseif ($row->orderstatus == 'ondelivery') {
                    $orders[] = $row;
                    $orderCounts['ondelivery']++;
                }
            }
        }
    ?>



    <?php

        $monthlyorders = [];
        $monthlyorderCounts = [
            'processing' => 0,
            'pending' => 0,
            'finished' => 0,
            'cancelled' => 0,
            'ondelivery' => 0,
        ];

        if (isset($_POST['selected_month'])) {
            $targetMonth = $_POST['selected_month'];
        } else {
            $targetMonth = date('F');
        }

        foreach ($producorderdata as $row) {
            $orderMonth = date('F', strtotime($row->orderdate));

            if ($orderMonth == $targetMonth) {
                if ($row->orderstatus == 'processing') {
                    $monthlyorders[$orderMonth][] = $row;
                    $monthlyorderCounts['processing']++;
                } elseif ($row->orderstatus == 'pending') {
                    $monthlyorders[$orderMonth][] = $row;
                    $monthlyorderCounts['pending']++;
                } elseif ($row->orderstatus == 'finished') {
                    $monthlyorders[$orderMonth][] = $row;
                    $monthlyorderCounts['finished']++;
                } elseif ($row->orderstatus == 'cancelled') {
                    $monthlyorders[$orderMonth][] = $row;
                    $monthlyorderCounts['cancelled']++;
                } elseif ($row->orderstatus == 'ondelivery') {
                    $monthlyorders[$orderMonth][] = $row;
                    $monthlyorderCounts['ondelivery']++;
                }
            }
        }
        
    ?>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart1');

            // Format PHP arrays as JSON for use in JavaScript
            const orderDatesJSON = <?php echo json_encode($orderdates); ?>;
            const totalsJSON = <?php echo json_encode($totals); ?>;

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: orderDatesJSON,
                    datasets: [{
                        label: 'Order Totals',
                        data: totalsJSON,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(0, 0, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart2');

            // Format PHP arrays as JSON for use in JavaScript
            const orderDatesJSON = <?php echo json_encode($orderdatesMonth); ?>;
            const totalsJSON = <?php echo json_encode($totalsMonth); ?>;

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: orderDatesJSON,
                    datasets: [{
                        label: 'Order Totals',
                        data: totalsJSON,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(0, 0, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart3');

            // Format PHP arrays as JSON for use in JavaScript
            const productNamesJSON = <?php echo json_encode($productnames); ?>;
            const productQuantitiesJSON = <?php echo json_encode($productquantities); ?>;

            const entries = Object.entries(productQuantitiesJSON);

            entries.sort((a, b) => b[1] - a[1]);

            const sortedObj = Object.fromEntries(entries);

            new Chart(ctx, {
                type: 'bar', // Change type to 'pie'
                data: {
                    labels: productNamesJSON,
                    datasets: [{
                        label: 'Product Quantities',
                        data: sortedObj,
                        backgroundColor: 'rgba(0, 0, 255, 1)',
                        borderColor: 'rgba(0, 0, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart4');

            // Format PHP arrays as JSON for use in JavaScript
            const productNamesJSON = <?php echo json_encode($productnames); ?>;
            const productSaleJSON = <?php echo json_encode($productsale); ?>;

            const entries = Object.entries(productSaleJSON);

            entries.sort((a, b) => b[1] - a[1]);

            const sortedObj = Object.fromEntries(entries);

            new Chart(ctx, {
                type: 'bar', // Change type to 'pie'
                data: {
                    labels: productNamesJSON,
                    datasets: [{
                        label: 'Product Sales',
                        data: sortedObj,
                        backgroundColor: 'rgba(0, 255, 0, 1)',
                        borderColor: 'rgba(0, 255, 0, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    // You can customize pie chart options here if needed
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart5');

            // Format PHP arrays as JSON for use in JavaScript
            const orderStatusesJSON = <?php echo json_encode(array_keys($orderCounts)); ?>;
            const orderCountsJSON = <?php echo json_encode(array_values($orderCounts)); ?>;

            const colors = ['rgba(0, 255, 0, 1)', 'rgba(255, 0, 0, 1)', 'rgba(0, 0, 255, 1)', 'rgba(255, 255, 0, 1)', 'rgba(255, 0, 255, 1)'];

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: orderStatusesJSON,
                    datasets: [{
                        label: 'Order Statuses',
                        data: orderCountsJSON,
                        backgroundColor: colors,
                        borderColor: 'rgba(255, 255, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            fontColor: 'black',
                        },
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                return percentage + "%";
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function(){
            const ctx = document.getElementById('myChart6');

            // Format PHP arrays as JSON for use in JavaScript
            const orderStatusesJSON = <?php echo json_encode(array_keys($monthlyorderCounts)); ?>;
            const orderCountsJSON = <?php echo json_encode(array_values($monthlyorderCounts)); ?>;

            const colors = ['rgba(0, 255, 0, 1)', 'rgba(255, 0, 0, 1)', 'rgba(0, 0, 255, 1)', 'rgba(255, 255, 0, 1)', 'rgba(255, 0, 255, 1)'];

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: orderStatusesJSON,
                    datasets: [{
                        label: 'Order Statuses',
                        data: orderCountsJSON,
                        backgroundColor: colors,
                        borderColor: 'rgba(255, 255, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            fontColor: 'black',
                        },
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                return percentage + "%";
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            });
        
        })

        function daily() {
            document.querySelector('.day').style.display = 'block';
            document.querySelector('.month').style.display = 'none';
            document.querySelector('.daybutton').style.backgroundColor = 'lightblue';
            document.querySelector('.monthbutton').style.backgroundColor = 'white';

        }

        function monthly() {
            document.querySelector('.day').style.display = 'none';
            document.querySelector('.month').style.display = 'block';
            document.querySelector('.daybutton').style.backgroundColor = 'white';
            document.querySelector('.monthbutton').style.backgroundColor = 'lightblue';
        }

        daily();
    </script>

</body>
</html>
