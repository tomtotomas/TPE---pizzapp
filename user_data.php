<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

require 'config.php'; 
$conn = connectDB();

$username = $_SESSION['username'];
$query = "SELECT nombre FROM user WHERE username = '$username'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre']; 
} else {
    $nombre = $username; 
}
?>

