<?php
require 'config.php';

class PizzaModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getPizzas() {
        $query = "SELECT pizza_id, pizza_name, price, image, category_id FROM pizza";
        $result = $this->conn->query($query);
        $pizzas = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pizzas[] = $row;
            }
        }

        return $pizzas;
    }

    public function getCategories() {
        $query = "SELECT category_id, category_name FROM category";
        $result = $this->conn->query($query);
        $categories = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[$row['category_id']] = $row['category_name'];
            }
        }

        return $categories;
    }

    public function updatePizzaPrice($pizza_id, $new_price) {
        $query = "UPDATE pizza SET price = ? WHERE pizza_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("di", $new_price, $pizza_id);
        $result = $stmt->execute();
        $stmt->close();

        return $result; 
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>