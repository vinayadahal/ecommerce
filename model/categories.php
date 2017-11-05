<?php

require_once '../../config/credentials.php';
require_once '../../core-model/model.php';

class categories {

    public $model;

    public function __construct() {
        $this->model = new model();
    }

    public function list_categories() {
        $this->model->select("*");
        $this->model->from('categories');
        return $this->model->get();
    }

    public function get_category($id) {
        $this->model->select("*");
        $this->model->from('categories');
        $this->model->where('category_id', $id);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function update_category($colname, $value, $id) {
        $col = array($colname => $value);
        $this->model->where("category_id", $id);
        return $this->model->update("categories", $col);
    }

    public function delete_category($id, $value) {
        $this->model->delete();
        $this->model->from("categories");
        $this->model->where($id, $value);
        return $this->model->remove();
    }

}
