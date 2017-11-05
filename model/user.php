<?php
require_once '../config/credentials.php';
require_once '../core-model/model.php';

//require_once '../../model/modelInsert.php';

class user {

    public $model;

    public function __construct() {
        $this->model = new model();
    }

    public function insert_customer($col_val) {
        return $this->model->insert("customers", $col_val, TRUE);
    }

    public function get_customer_condtion($email) {
        $col = array('id');
        $this->model->select($col);
        $this->model->from('customers');
        $this->model->where('email', $email);
        $this->model->limit(1);
        return $this->model->get();
    }

}
