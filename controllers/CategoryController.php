<?php
require_once 'models/CategoryModel.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    public function addCategory($category_name) {
        return $this->categoryModel->insertCategory($category_name);
    }
}
?>