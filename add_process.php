<?php
require 'controllers/PizzaController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $pizza_name = $_POST['pizza_name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];

    $pizzaController = new PizzaController();

    try {
        $pizzaController->addPizza($pizza_name, $category_id, $price);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    header("Location: admin.php");
    exit;
}
?>
