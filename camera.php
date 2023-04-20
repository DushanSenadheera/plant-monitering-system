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
          <li><i class="fad fa-humidity"></i> <a href="">Humidity</a></li>
          <li><i class="fas fa-tint"></i> <a href="">Soil Moisture</a></li>
          <li><i class="fas fa-ruler-horizontal"></i> <a href="">pH</a></li>
          <br />
          <small>View</small>
          <li><i class="fas fa-cctv"></i> <a href="camera.php">Observe</a></li>
          <br />
          <li><i class="fas fa-sign-out"></i> <a href="">Logout</a></li>
        </ul>
      </div>
      <div class="navContent">
        <video id="video" autoplay></video>
      </div>
    </div>
    <script src="scripts/camera.js" ></script>
    <script src="https://kit.fontawesome.com/56016c02ef.js"crossorigin="anonymous"></script>
  </body>
</html>
