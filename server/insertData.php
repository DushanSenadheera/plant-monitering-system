<?php

if(isset($_GET["temperature"]) && isset($_GET["humidity"]) && isset($_GET["WaterTemp"]) && isset($_GET["ldr"]) && isset($_GET["co2"]) && isset($_GET["temp_out"]) && isset($_GET["humidity_out"]) && isset($_GET["pH"]) && isset($_GET["N"]) && isset($_GET["P"]) && isset($_GET["K"])){

   $temperature = $_GET["temperature"]; 
   $humidity = $_GET["humidity"];
   $WaterTemp = $_GET["WaterTemp"]; 
   $ldr = $_GET["ldr"]; 
   $co2 = $_GET["co2"]; 
   $temp_out = $_GET["temp_out"];
   $humidity_out = $_GET["humidity_out"];
   $pH = $_GET["pH"];
   $N = $_GET["N"];
   $P = $_GET["P"];
   $K = $_GET["K"];

   include './server/connection.php';

   $sql = "INSERT INTO greenhouse (temp,humidity,co2,water_temp,ligh,ph,nitrogen,phosphorus,potassium,temp_out,humidity_out) 
   VALUES ($temperature,$humidity,$co2,$WaterTemp,$ldr,$pH,$N,$P,$K,$temp_out,$humidity_out)";

   if ($connection->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $connection->error;
   }

   $connection->close();
  }
else {
   echo "values not set in the HTTP request";
}

?>
