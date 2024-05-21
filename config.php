<?php

$host       = "localhost"; 
$username   = "root"; 
$pass       = ""; 
$db         = "profile_kiel"; 
$conn    = mysqli_connect($host, $username, $pass, $db); 

if (!$conn) {
    die("Not connected: " . mysqli_connect_error());
}

$query = "SELECT * FROM home";
$result = $conn->query($query);

?>