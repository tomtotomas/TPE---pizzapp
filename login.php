<?php
session_start();

$error = '';

require 'config.php';
$conn = connectDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        
        if ($user['username'] === 'webadmin') {
            $_SESSION['is_admin'] = true; 
        } else {
            $_SESSION['is_admin'] = false; 
        }
        
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Contraseña y/o usuario incorrectos.']);
    }
}
?>
