<?php

require_once '../config/site-config.php';
require_once '../model/order.php';
require_once '../model/product.php';
require_once '../model/categories.php';
require_once '../model/user.php';
require_once '../service/helper-method.php'; // write some if login check
if (!checkLogin()) {
    header("Location: " . base_url . "/admin/login");
}

if (!isset($_REQUEST['target'])) {
    $order = new order();
    $i = 0;
    $result = $order->get_order_id();
    foreach ($result as $order_items) {
        $orders = $order->get_order_details($order_items['order_id']);
        foreach ($orders as $items) {
            if ($items['status'] == 0) {
                $customer_details = (new user())->get_user_id($items['customer_id']);
                $customer_order[$i++] = array(
                    'order_id' => $order_items['order_id'],
                    'total_price' => $items['total_price'],
                    'customer_name' => $customer_details[0]['firstname'] . " " . $customer_details[0]['lastname']
                );
            }
        }
    }
}

if (isset($_REQUEST['id']) && $_REQUEST['target'] == 'showOrder') {
    $id = $_REQUEST['id'];
    $order = new order();
    $product = new product();
    $user = new user();
    $i = 0;
    $result_product = $order->get_product_id(htmlspecialchars($_REQUEST['id']));
    $result_order_cust_id = $order->get_order_details(htmlspecialchars($_REQUEST['id']));
    $result_customer = $user->get_user_id($result_order_cust_id[0]['customer_id']);
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'deliverOrder') {
    $order_id = htmlspecialchars($_GET['id']);
    $result = (new order())->update_order_status("status", '1', $order_id);
//    if ($result) {
//        header("Location: " . base_url . "/admin/orders/");
//    }
}