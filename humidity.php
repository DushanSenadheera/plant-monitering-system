<?php

$dataPoints1 = array();
$dataPoints2 = array();
$updateInterval = 2000; //in millisecond
$initialNumberOfDataPoints = 100;
$x = time() * 1000 - $updateInterval * $initialNumberOfDataPoints;
$y1 = 75;
$y2 = 60;
// generates first set of dataPoints 
for ($i = 0; $i < $initialNumberOfDataPoints; $i++) {
    $y1 += round(rand(-2, 2));
    $y2 += round(rand(-2, 2));
    array_push($dataPoints1, array("x" => $x, "y" => $y1));
    array_push($dataPoints2, array("x" => $x, "y" => $y2));
    $x += $updateInterval;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <section>
            <h2>Dashboard</h2>
            <i class="fas fa-leaf"></i>
        </section>
        <section>
            <h5>Admin</h5>
            <i class="fas fa-user-shield" id="admin-ico"></i>
        </section>
    </nav>
    <div class="container">
        <div class="navLinks">
            <ul>
                <li><i class="fas fa-th-large"></i> <a href="index.php">Dashboard</a></li>
                <br />
                <small>Statistics</small>
                <li>
                    <i class="fas fa-temperature-low"></i> <a href="temp.php">Temperature</a>
                </li>
                <li><i class="fas fa-tint"></i> <a href="humidity.php">Humidity</a></li>
                <li><i class="fas fa-percentage"></i> <a href="npk.php">NPK</a></li>
                <li><i class="fad fa-dewpoint"></i> <a href="waterTemp.php">Water Temperature</a></li>
                <li><i class="fas fa-ruler-horizontal"></i> <a href="ph.php">pH</a></li>
                <li><i class="fas fa-heat"></i> <a href="co2.php">CO2</a></li>
                <br />
                <small>View</small>
                <li><i class="fas fa-eye"></i> <a href="camera.php">Observe</a></li>
                <br />
                <li><i class="fas fa-sign-out-alt"></i> <a href="">Logout</a></li>
            </ul>
        </div>
        <div class="navContent">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script>
                window.onload = function() {

                    var updateInterval = <?php echo $updateInterval ?>;
                    var dataPoints1 = <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>;
                    var dataPoints2 = <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>;
                    var yValue1 = <?php echo $y1 ?>;
                    var yValue2 = <?php echo $y2 ?>;
                    var xValue = <?php echo $x ?>;

                    var chart = new CanvasJS.Chart("chartContainer", {
                        zoomEnabled: true,
                        title: {
                            text: "Humidity"
                        },
                        axisX: {
                            title: ""
                        },
                        axisY: {
                            suffix: " %"
                        },
                        toolTip: {
                            shared: true
                        },
                        legend: {
                            cursor: "pointer",
                            verticalAlign: "top",
                            fontSize: 22,
                            fontColor: "dimGrey",
                            itemclick: toggleDataSeries
                        },
                        data: [{
                                type: "line",
                                name: "Inside",
                                xValueType: "dateTime",
                                yValueFormatString: "#,### %",
                                xValueFormatString: "hh:mm:ss TT",
                                showInLegend: true,
                                legendText: "{name} " + yValue1 + " %",
                                dataPoints: dataPoints1
                            },
                            {
                                type: "line",
                                name: "Outside",
                                xValueType: "dateTime",
                                yValueFormatString: "#,### %",
                                showInLegend: true,
                                legendText: "{name} " + yValue2 + " %",
                                dataPoints: dataPoints2
                            }
                        ]
                    });

                    chart.render();
                    setInterval(function() {
                        updateChart()
                    }, updateInterval);

                    function toggleDataSeries(e) {
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        } else {
                            e.dataSeries.visible = true;
                        }
                        chart.render();
                    }

                    function updateChart() {
                        var deltaY1, deltaY2;
                        xValue += updateInterval;
                        // adding random value
                        yValue1 += Math.round(2 + Math.random() * (-2 - 2));
                        yValue2 += Math.round(2 + Math.random() * (-2 - 2));

                        // pushing the new values
                        dataPoints1.push({
                            x: xValue,
                            y: yValue1
                        });
                        dataPoints2.push({
                            x: xValue,
                            y: yValue2
                        });

                        // updating legend text with  updated with y Value 
                        chart.options.data[0].legendText = "Humidity(In)" + yValue1 + " %";
                        chart.options.data[1].legendText = "Humidity(Out)" + yValue2 + " %";
                        chart.render();
                    }

                }
            </script>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
</body>

</html>