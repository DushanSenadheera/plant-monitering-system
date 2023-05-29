<?php

include './server/connection.php';

$sql = "SELECT * FROM greenhouse ORDER BY id DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

        $temperature = $row["temperature"];
        $humidity = $row["humidity"];
        $WaterTemp = $row["WaterTemp"];
        $ldr = $row["ldr"];
        $co2 = $row["co2"];
        $temp_out = $row["temp_out"];
        $humidity_out = $row["humidity_out"];
        $pH = $row["pH"];
        $N = $row["N"];
        $P = $row["P"];
        $K = $row["K"];
        
  }
} else {
  echo "0 results";
}
$conn->close();
?>