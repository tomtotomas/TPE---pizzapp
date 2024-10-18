<?php
require 'config.php';

class DeleteModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB(); 
    }

    public function deletePizza($pizza_id) {
        $query = "DELETE FROM pizza WHERE pizza_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $pizza_id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function deleteCategory($category_id) {
        $query = "DELETE FROM category WHERE category_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $category_id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function __destruct() {
        $this->conn->close(); 
    }
}
?>