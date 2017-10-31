<?php

//require_once '../core-model/model.php';

class category {

    public $model;

    public function __construct() {
        $this->model = new model();
    }

    public function list_categories() {
        $col = array('id', 'category_title');
        $this->model->select($col);
        $this->model->from('categories');
        return $this->model->get();
    }

    public function list_product_condtion($product_id) {
        $col = array('id', 'title', 'price', 'quantity');
        $this->model->select($col);
        $this->model->from('products');
        $this->model->where('id', $product_id);
        return $this->model->get();
    }

    public function get_category($category_id) {
        $col = array('category_title');
        $this->model->select($col);
        $this->model->from('categories');
        $this->model->where('category_id', $category_id);
        $this->model->limit('1');
        return $this->model->get();
    }

}
