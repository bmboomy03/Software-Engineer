<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: 55" . mysqli_connect_error());
}else{
echo "";//"Connected successfully"
}

?>