<?php
$servername = "localhost";
$username = "enginmfy_cmn";
$password = "";
$db = "enginmfy_es";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
print_r($conn); exit;
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}


?>