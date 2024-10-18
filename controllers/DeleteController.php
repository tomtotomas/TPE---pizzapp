<?php
require_once 'models/DeleteModel.php';

class DeleteController {
    private $deleteModel;

    public function __construct() {
        $this->deleteModel = new DeleteModel();
    }

    public function deleteItem($delete_type, $id) {
        if ($delete_type === 'pizza') {
            return $this->deleteModel->deletePizza($id);
        } elseif ($delete_type === 'category') {
            return $this->deleteModel->deleteCategory($id);
        }
        return false;
    }
}
?>