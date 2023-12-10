<?php
$servernameku = "localhost";
$username = "root";
$dbname = "expo";
$password = "root";

// Create connection
$conn =  mysqli_connect($servernameku, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("koneksi gagal: " . mysqli_connect_error());
}
?>