<?php

require_once '../config/site-config.php';
require_once '../model/order.php';
require_once '../model/product.php';
require_once '../model/categories.php';
require_once '../model/user.php';
require_once '../service/helper-method.php'; // write some if login check

if (!isset($_REQUEST['target'])) {
    $order = new order();
    $i = 0;
    $result = $order->get_order_id();
    foreach ($result as $order_items) {
        $orders = $order->get_order_details($order_items['order_id']);
        foreach ($orders as $items) {
            $customer_details = (new user())->get_user_id($items['id']);
            $customer_order[$i++] = array(
                'order_id' => $order_items['order_id'],
                'total_price' => $items['total_price'],
                'customer_name' => $customer_details[0]['firstname'] . " " . $customer_details[0]['lastname']
            );
        }
    }
}

if (isset($_REQUEST['id']) && $_REQUEST['target'] == 'showOrder') {
    $order = new order();
    $product = new product();
    $i = 0;
    $result = $order->get_product_id(htmlspecialchars($_REQUEST['id']));
    $quantity = $result[0]['quantity'];
    $product_id = $result[0]['product_id'];
//    var_dump($result);
    $product_details = $product->get_product($product_id);
    //    var_dump($prd);
//    foreach ($result as $order_items) {
//        $orders = $order->get_order_details($order_items['order_id']);
//        foreach ($orders as $items) {
//            $customer_details = (new user())->get_user_id($items['id']);
//            $customer_order[$i++] = array(
//                'order_id' => $order_items['order_id'],
//                'total_price' => $items['total_price'],
//                'customer_name' => $customer_details[0]['firstname'] . " " . $customer_details[0]['lastname']
//            );
//        }
//    }
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


