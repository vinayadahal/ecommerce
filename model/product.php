<?php

require_once '../config/credentials.php';
require_once '../core-model/model.php';

//require_once '../../model/modelInsert.php';

class product {

    public $model;

    public function __construct() {
        $this->model = new model();
    }

    public function list_product() {
        $this->model->select("*");
        $this->model->from('products');
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

    public function get_all_category() {
        $this->model->select("*");
        $this->model->from('categories');
        return $this->model->get();
    }

    public function get_product($id) {
        $this->model->select("*");
        $this->model->from('products');
        $this->model->where('id', $id);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function add_product($col_val) {
        return $this->model->insert("products", $col_val);
    }

    public function update_product($col, $id) {
        $this->model->where("id", $id);
        return $this->model->update("products", $col);
    }

    public function delete_product($id, $value) {
        $this->model->delete();
        $this->model->from("products");
        $this->model->where($id, $value);
        return $this->model->remove();
    }

}
