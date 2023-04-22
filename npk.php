<?php

$dataPoints = array(
  array("label" => "Inside temperature", "y" => 20),
  array("label" => "Outside temperature", "y" => 65),
  array("label" => "Inside Humidity", "y" => 11),
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
        <li><i class="fas fa-percentage"></i> <a href="">NPK</a></li>
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
    </div>
  </div>
  <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="scripts/camera.js"></script>
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "NPK Ratio"
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