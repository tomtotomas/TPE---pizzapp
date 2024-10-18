<?php
session_start();
require 'config.php';

$conn = connectDB();

$query = "SELECT p.pizza_id, p.pizza_name, p.price, p.image 
          FROM pizza p 
          JOIN category c ON p.category_id = c.category_id 
          WHERE c.category_name = 'Especiales'";
$result = $conn->query($query);

$categoryTitle = "Pizzas Especiales"; 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PIZZAS BALBOA</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <header>
        <?php include 'views/nav.phtml'; ?>
    </header>

    <body class="home-b">
    <main>
    <?php include 'views/pizzas_especiales.phtml'; ?>
    </main>
    <script src="js/shop.js"></script>

    <?php include 'views/footer.phtml'; ?>