<?php

require 'controllers/CategoryController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];

    $categoryController = new CategoryController();

    try {
        $categoryController->addCategory($category_name);
        header("Location: admin.php?success=Categoría agregada");
    } catch (Exception $e) {
        header("Location: admin.php?error=" . urlencode($e->getMessage()));
    }
    exit;
}
?>