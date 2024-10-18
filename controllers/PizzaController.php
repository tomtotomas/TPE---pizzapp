<?php
require_once 'models/PizzaModel.php';

class PizzaController {
    private $pizzaModel;

    public function __construct() {
        $this->pizzaModel = new PizzaModel();
    }

    public function showPizzas() {
        $pizzas = $this->pizzaModel->getPizzas();
        $categories = $this->pizzaModel->getCategories();

        $groupedPizzas = [];
        foreach ($pizzas as $pizza) {
            $groupedPizzas[$pizza['category_id']]['pizzas'][] = $pizza;
        }

        return [$groupedPizzas, $categories];
    }

    public function addPizza($pizza_name, $category_id, $price) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = __DIR__ . "/../images/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            
            if (!is_dir($target_dir)) {
                throw new Exception("La carpeta de destino no existe.");
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $query = "INSERT INTO pizza (pizza_name, category_id, price, image) VALUES (?, ?, ?, ?)";
                $stmt = $this->pizzaModel->getConnection()->prepare($query);
                $stmt->bind_param("sids", $pizza_name, $category_id, $price, $_FILES['image']['name']);

                if (!$stmt->execute()) {
                    throw new Exception("Error al insertar la pizza: " . $stmt->error);
                }
                $stmt->close();
            } else {
                throw new Exception("Error al mover la imagen. Detalle: " . print_r($_FILES['image'], true));
            }
        } else {
            throw new Exception("No se ha subido una imagen válida.");
        }
    }

    public function updatePizzaPrice($pizza_id, $new_price) {
        return $this->pizzaModel->updatePizzaPrice($pizza_id, $new_price);
    }

    public function getPizzas() {
        return $this->pizzaModel->getPizzas();
    }
}
?>

