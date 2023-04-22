<?php

$dataPoints = array();
$y = 5;
for ($i = 0; $i < 10; $i++) {
    $y += rand(-1, 1) * 0.1;
    array_push($dataPoints, array("x" => $i, "y" => $y));
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

                    var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;

                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light2",
                        title: {
                            text: "Humidity"
                        },
                        axisX: {
                            title: "Time in millisecond"
                        },
                        axisY: {
                            suffix: " %"
                        },
                        data: [{
                            type: "line",
                            yValueFormatString: "#,##0.0#",
                            toolTipContent: "{y} %",
                            dataPoints: dataPoints
                        }]
                    });
                    chart.render();

                    var updateInterval = 1500;
                    setInterval(function() {
                        updateChart()
                    }, updateInterval);

                    var xValue = dataPoints.length;
                    var yValue = dataPoints[dataPoints.length - 1].y;

                    function updateChart() {
                        yValue += (Math.random() - 0.5) * 0.1;
                        dataPoints.push({
                            x: xValue,
                            y: yValue
                        });
                        xValue++;
                        chart.render();
                    };
                }
            </script>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
</body>
</html>