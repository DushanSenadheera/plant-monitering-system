<?php

$servername = "kfgk8u2ogtoylkq9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
   $username = "kih0ldprjrs8vcm7";
   $password = "wxfpj7z0q9gblr3z";
   $database_name = "p384g3ggmy9dzqzv";

   $connection = new mysqli($servername, $username, $password, $database_name);

   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }
   
?>

mysql://kih0ldprjrs8vcm7:wxfpj7z0q9gblr3z@kfgk8u2ogtoylkq9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/p384g3ggmy9dzqzv