<?php
$hostname = "localhost";
$username = "jamesses_toni";
$password = "oniTayossRay!#";
$dbname = "jamesses_toni";

$link=mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$dbSelected = mysqli_select_db($link, $dbname);
?>