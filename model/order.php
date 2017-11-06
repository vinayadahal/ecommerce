<?php

require_once '../config/credentials.php';
require_once '../core-model/model.php';

class order {

    public $model;

    public function __construct() {
        $this->model = new model();
    }

    public function insert_order($col_val) {
        return $this->model->insert("orders", $col_val, TRUE);
    }

    public function insert_order_items($col_val) {
        return $this->model->insert("order_items", $col_val);
    }

    public function get_customer_condtion($email) {
        $col = array('id');
        $this->model->select($col);
        $this->model->from('customers');
        $this->model->where('email', $email);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function get_order_id() {
        $col = array("order_id");
        $this->model->select($col, "DISTINCT");
        $this->model->from('order_items');
        return $this->model->get();
    }

    public function get_product_id($id) {
        $this->model->select("*");
        $this->model->from('order_items');
        $this->model->where('order_id', $id);
        return $this->model->get();
    }

    public function get_order_details($id) {
        $this->model->select("*");
        $this->model->from('orders');
        $this->model->where('id', $id);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function update_order_status($colname, $value, $id) {
        $col = array($colname => $value);
        $this->model->where("customer_id", $id);
        return $this->model->update("orders", $col);
    }

}
