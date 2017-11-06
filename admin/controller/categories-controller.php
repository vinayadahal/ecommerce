<?php

require_once '../config/site-config.php';
require_once '../model/categories.php';
require_once '../service/helper-method.php'; // write some if login check
if (!checkLogin()) {
    header("Location: " . base_url . "/admin/login");
}

if (!isset($_REQUEST['target'])) {
    $result = (new categories())->list_categories();
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'addCategory') {
    $category_name = htmlspecialchars($_POST['category_name']);
    $result = (new categories())->add_category(array("category_title" => $category_name));
    header("Location: " . base_url . "/admin/categories");
}

if (isset($_REQUEST['id']) && $_REQUEST['target'] == 'editCategory') {
    $id = htmlspecialchars($_REQUEST['id']);
    $result = (new categories())->get_category($id);
    $items = $result[0];
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'updateCategory') {
    $category = htmlspecialchars($_POST['category_id']);
    $category_name = htmlspecialchars($_POST['category_name']);
    $result = (new categories())->update_category("category_title", $category_name, $category);
    header("Location: " . base_url . "/admin/categories");
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'deleteCategory') {
    $category = htmlspecialchars($_GET['id']);
    $result = (new categories())->delete_category("category_id", $category);
    if ($result) {
        header("Location: " . base_url . "/admin/categories");
    }
}


