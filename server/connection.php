<?php

$servername = "localhost";
   $username = "esp32";
   $password = "microcontrollerslab@123";
   $database_name = "database_ESP32";

   $connection = new mysqli($servername, $username, $password, $database_name);

   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }
   
?>