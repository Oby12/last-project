<?php
// configuration
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db_pariwisata"; 

// create connection
$conn = new mysqli($servername, $username, $password, $database);

// connection handler
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>