<?php
session_start();
require 'controllers/DeleteController.php';

if ($_SESSION['username'] !== 'webadmin') {
    header('Location: home.php');
    exit;
}

$deleteController = new DeleteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delete_type = $_POST['delete_type'];
    
    if ($delete_type === 'pizza') {
        $pizza_id = $_POST['pizza_id'];
        if ($deleteController->deleteItem($delete_type, $pizza_id)) {
            header('Location: admin.php?message=pizza_deleted');
        } else {
            header('Location: admin.php?error=pizza_delete_failed');
        }
    } elseif ($delete_type === 'category') {
        $category_id = $_POST['category_id'];
        if ($deleteController->deleteItem($delete_type, $category_id)) {
            header('Location: admin.php?message=category_deleted');
        } else {
            header('Location: admin.php?error=category_delete_failed');
        }
    }
}
?>