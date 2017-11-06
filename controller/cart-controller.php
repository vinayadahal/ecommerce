<?php

require_once '../config/site-config.php';
require_once '../model/product.php';
session_start();

//logic for placing order
if ($_REQUEST['action'] == 'placeOrder' && count($_SESSION['cart_items']) > 0 && count($_SESSION['customer_detail']) > 0) {
    require_once '../model/user.php';
    require_once '../model/order.php';

    $customer_details = $_SESSION['customer_detail'][0];
    $customer_id = (new user())->insert_customer($customer_details);

    if (empty($customer_id)) {
        header("Location: " . base_url);
    }

    $order_data = array(
        "customer_id" => $customer_id,
        "total_price" => $_SESSION['grand_total'],
        "status" => 0
    );

    $order_id = (new order())->insert_order($order_data);

    if (empty($order_id)) {
        header("Location: " . base_url);
    }
    $cart_items = $_SESSION['cart_items'];
    foreach ($cart_items as $products) {
        $order_items = array(
            "order_id" => $order_id,
            "product_id" => $products['id'],
            "quantity" => $products['qty']
        );
        $response = (new order())->insert_order_items($order_items);
    }
    if ($response) {
        header("Location: " . base_url . "/orderSuccess/");
        unset($_SESSION['cart_items']);
    } else {
        header("Location: " . base_url);
    }
}

//logic to handle cart actions
if (isset($_REQUEST['action'], $_REQUEST['id'])) {
    if ($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])) {
        $result = (new product())->list_product_condtion($_REQUEST['id']);
        foreach ($result as $row) {
            $itemData = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'price' => $row['price'],
                'subtotal' => $row['price'],
                'qty' => 1,
                'max_quantity' => $row['quantity']
            );
        }
        addItem($itemData);
    } elseif ($_REQUEST['action'] == 'updateCount' && !empty($_REQUEST['id']) && !empty($_REQUEST['count'])) {
        $count = $_REQUEST['count'];
        $session_key_id = ($_REQUEST['id'] - 1);
        updateItemCount($session_key_id, $count);
    } elseif ($_REQUEST['action'] == 'removeFromCart' && !empty($_REQUEST['id'])) {
        $session_key_id = ($_REQUEST['id'] - 1);
        removeItem($session_key_id);
    } else {
        header("Location: " . base_url);
    }
} else {
    header("Location: " . base_url);
}

function addItem($item_data) {
    if (empty($_SESSION['cart_items'])) {
        $_SESSION['cart_items'] = array();
        array_push($_SESSION['cart_items'], $item_data); //pushes new element to array
    } else {
        array_push($_SESSION['cart_items'], $item_data); //pushes new element to array
    }
}

function updateItemCount($array_id, $count) {
    if (empty($_SESSION['cart_items'])) {
        echo "empty cart";
        return;
    }
    $subtotal = ($count * $_SESSION['cart_items'][$array_id]['price']);
    $_SESSION['cart_items'][$array_id]['qty'] = $count;
    $_SESSION['cart_items'][$array_id]['subtotal'] = $subtotal;
    echo $subtotal;
}

function removeItem($array_id) {
    if (empty($_SESSION['cart_items'])) {
        echo "empty cart";
        return;
    }
//    $_SESSION['cart_items'] = array_values($_SESSION['cart_items']); // rearranging array before unset
    unset($_SESSION['cart_items'][$array_id]);
//    $_SESSION['cart_items'] = array_values($_SESSION['cart_items']); // rearranging array after unset
}
