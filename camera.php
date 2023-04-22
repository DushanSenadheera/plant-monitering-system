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
      <video id="video" autoplay></video>
    </div>
  </div>
  <script src="scripts/camera.js"></script>
  <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
</body>

</html>