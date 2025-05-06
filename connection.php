<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_pielago_im";

// Create connection
$connection = new mysqli($servername, $username, "", $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
