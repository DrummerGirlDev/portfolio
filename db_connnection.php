<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$link=mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$dbSelected = mysqli_select_db($link, $dbname);
?>