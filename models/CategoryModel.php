<?php
require 'config.php';

class CategoryModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function insertCategory($category_name) {
        $sql = "INSERT INTO category (category_name) VALUES (?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $category_name);
            if ($stmt->execute()) {
                return true;
            }
            $stmt->close();
        }
        return false; 
    }

    public function __destruct() {
        $this->conn->close(); 
    }
}
?>