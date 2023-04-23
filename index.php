<?php

$dataPoints = array(
  array("label" => "label", "y" => 28),
  array("label" => "label", "y" => 70),
  array("label" => "label", "y" => 80),
  array("label" => "label", "y" => 32),
  array("label" => "label", "y" => 10),
  array("label" => "label", "y" => 5),
  array("label" => "label", "y" => 14),
  array("label" => "label", "y" => 6.5)
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
      <div class="overview">
        <div class="overviewContent">
          <div class="overviewCard">
            <h4>Temperature</h4>
            <h3>28°C</h3>
          </div>
          <div class="overviewCard">
            <h4>Humidity</h4>
            <h3>70%</h3>
          </div>
          <div class="overviewCard">
            <h4>N:P:K</h4>
            <h3>30:10:15</h3>
          </div>
          <div class="overviewCard">
            <h4>pH</h4>
            <h3>6.5</h3>
          </div>
          <div class="overviewCard">
            <h4>Water Temp</h4>
            <h3>32°C</h3>
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
      
          if (i == 0) {
            dps[i] = {
              label: "Temperatue (In)",
              y: yVal,
              color: color
            };
          } else if (i == 1) {
            dps[i] = {
              label: "Humidity (In)",
              y: yVal,
              color: color
            };
          } else if (i == 2) {
            dps[i] = {
              label: "CO2",
              y: yVal,
              color: color
            };
          } else if (i == 3) {
            dps[i] = {
              label: "Water Temperature",
              y: yVal,
              color: color
            };
          } else if (i == 4) {
            dps[i] = {
              label: "N",
              y: yVal,
              color: color
            };
          } else if (i == 5) {
            dps[i] = {
              label: "P",
              y: yVal,
              color: color
            };
          } else if (i == 6) {
            dps[i] = {
              label: "K",
              y: yVal,
              color: color
            };
          }else if (i == 7) {
            dps[i] = {
              label: "pH",
              y: yVal,
              color: color
            };
          }
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