<?php

require_once '../model/model.php';

//require_once '../../model/modelInsert.php';

class cart {

    public $model;

    public function __construct() {
        $this->model = new model();
    }

    public function list_product() {
        $col = array('id', 'title', 'image', 'description', 'price', 'category_id');
        $this->model->select($col);
        $this->model->from('products');
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
