<?php

include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $birthday = $_POST['birthday'];
    $adress = $_POST['adress'];

    $sql = "INSERT INTO user (username, name, email, password, birthday, adress) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $conn = connectDB(); 

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss", $username, $name, $email, $password, $birthday, $adress);

        if ($stmt->execute()) {
            header('Location: index.php?message=registered');
        } else {
            header('Location: index.php?error=register_failed');
        }

        $stmt->close();
    }
}

$conn->close();
?>
