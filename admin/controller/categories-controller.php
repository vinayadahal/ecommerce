<?php

require_once '../../config/site-config.php';
require_once '../../model/categories.php';
require_once '../../service/helper-method.php'; // write some if login check

if (!isset($_REQUEST['target'])) {
    $result = (new categories())->list_categories();
}

if (isset($_REQUEST['id']) && $_REQUEST['target'] == 'editCategory') {
    $id = htmlspecialchars($_REQUEST['id']);
    $result = (new categories())->get_category($id);
    foreach ($result as $items) {
        require_once '../categories/edit.php';
    }
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


