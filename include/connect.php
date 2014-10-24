<?php

$con = mysql_connect("localhost", "db_user", "db_user", "buzzspot");

if (mysqli_connect_errno()) {
  echo "Failed to connect to Database: " . mysqli_connect_error();
}

?>
