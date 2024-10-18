<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'webadmin') {
    header('Location: home.php');
    exit;
}

require 'models/PizzaModel.php';
require 'controllers/PizzaController.php';

$pizzaController = new PizzaController();

$conn = connectDB();
$query = "SELECT category_id, category_name FROM category";
$result = $conn->query($query);

include 'views/admin.phtml';

