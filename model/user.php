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

    public function get_user_id($id) {
        $this->model->select("*");
        $this->model->from('customers');
        $this->model->where('id', $id);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function get_customer_condtion($email) {
        $col = array('id');
        $this->model->select($col);
        $this->model->from('customers');
        $this->model->where('email', $email);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function get_admin() {
        $this->model->select("*");
        $this->model->from('admins');
        return $this->model->get();
    }

    public function get_single_admin($id) {
        $this->model->select("*");
        $this->model->from('admins');
        $this->model->where('id', $id);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function login_single_admin($username, $password) {
        $this->model->select("*");
        $this->model->from('admins');
        $this->model->where('username', $username);
        $this->model->where('pass', $password);
        $this->model->limit(1);
        return $this->model->get();
    }

    public function insert_user($col_val) {
        return $this->model->insert("admins", $col_val);
    }

    public function update_user($col, $id) {
        $this->model->where("id", $id);
        return $this->model->update("admins", $col);
    }

    public function delete_user($id, $value) {
        $this->model->delete();
        $this->model->from("admins");
        $this->model->where($id, $value);
        return $this->model->remove();
    }

}
