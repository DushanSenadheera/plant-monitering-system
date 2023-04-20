<?php

$dataPoints = array(
  array("label" => "Inside temperature", "y" => 20),
  array("label" => "Outside temperature", "y" => 65),
  array("label" => "Inside Humidity", "y" => 11),
  array("label" => "Water Level", "y" => 5),
  array("label" => "CO2", "y" => 48),
  array("label" => "Water Temperature", "y" => 8),
  array("label" => "pH", "y" => 2),
  array("label" => "NPK", "y" => 18)
);

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
    <h2>Dashboard</h2>
    <h5>Admin</h5>
  </nav>
  <div class="container">
    <div class="navLinks">
      <ul>
        <li><i class="fas fa-th-large"></i> <a href="index.php">Dashboard</a></li>
        <br />
        <small>Statistics</small>
        <li>
          <i class="fas fa-temperature-low"></i> <a href="">Temperature</a>
        </li>
        <li><i class="fas fa-tint"></i> <a href="">Humidity</a></li>
        <li><i class="fas fa-tint"></i> <a href="">Soil Moisture</a></li>
        <li><i class="fas fa-ruler-horizontal"></i> <a href="">pH</a></li>
        <br />
        <small>View</small>
        <li><i class="fas fa-eye"></i> <a href="camera.php">Observe</a></li>
        <br />
        <li><i class="fas fa-sign-out-alt"></i> <a href="">Logout</a></li>
      </ul>
    </div>
    <div class="navContent">
      <h3>Overview</h3>
      <div class="overview">
        <div class="overviewContent">
          <div class="overviewCard">
            <h4>Temperature</h4>
            <h1>31°C</h1>
          </div>
          <div class="overviewCard">
            <h4>Humidity</h4>
            <h1>43%</h1>
          </div>
          <div class="overviewCard">
            <h4>Soil Moisture</h4>
            <h1>62%</h1>
          </div>
          <div class="overviewCard">
            <h4>pH</h4>
            <h1>6.0</h1>
          </div>
        </div>
        <br>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="scripts/camera.js"></script>
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "Overview"
        },
        axisY: {
          minimum: 0,
          maximum: 100,
          suffix: "%"
        },
        data: [{
          type: "column",
          yValueFormatString: "#,##0.00\"%\"",
          indexLabel: "{y}",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });

      function updateChart() {
        var color, deltaY, yVal;
        var dps = chart.options.data[0].dataPoints;
        for (var i = 0; i < dps.length; i++) {
          deltaY = (2 + Math.random() * (-2 - 2));
          yVal = Math.min(Math.max(deltaY + dps[i].y, 0), 90);
          color = yVal > 75 ? "#FF2500" : yVal >= 50 ? "#FF6000" : yVal < 50 ? "#41CF35" : null;
          dps[i] = {
            label: "Core " + (i + 1),
            y: yVal,
            color: color
          };
        }
        chart.options.data[0].dataPoints = dps;
        chart.render();
      };
      updateChart();

      setInterval(function() {
        updateChart()
      }, 1000);

    }
  </script>
</body>

</html>