<?php

$con = mysql_connect("localhost", "admin", "admin", "buzzspot");

if (mysqli_connect_errno()) {
  echo "Failed to connect to Database: " . mysqli_connect_error();
}

?>
