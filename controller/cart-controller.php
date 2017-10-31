<?php

require_once '../model/product.php';
session_start();
//session_destroy();
if (isset($_REQUEST['action'], $_REQUEST['id']) && !empty($_REQUEST['action']) && !empty($_REQUEST['id'])) {
    if ($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])) {
        $result = (new product())->list_product_condtion($_REQUEST['id']);
        foreach ($result as $row) {
            $itemData = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'price' => $row['price'],
                'subtotal' => $row['price'],
                'qty' => 1,
                'max_quantity' => $row['quantity'],
                'rowid' => md5($row['id'])
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
    } elseif ($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])) {
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orders (customer_id, total_price, created) VALUES ('" . $_SESSION['sessCustomerID'] . "', '" . $cart->total() . "', '" . date("Y-m-d H:i:s") . "')");

        if ($insertOrder) {
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach ($cartItems as $item) {
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('" . $orderID . "', '" . $item['id'] . "', '" . $item['qty'] . "');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);

            if ($insertOrderItems) {
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            } else {
                header("Location: checkout.php");
            }
        } else {
            header("Location: checkout.php");
        }
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

function addItem($item_data) {
    if (empty($_SESSION['cart_items'])) {
        $_SESSION['cart_items'] = array();
        array_push($_SESSION['cart_items'], $item_data); //pushes new element to array
    } else {
        array_push($_SESSION['cart_items'], $item_data); //pushes new element to array
    }
//    session_destroy();
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
    $_SESSION['cart_items'] = array_values($_SESSION['cart_items']); // rearranging array before unset
    unset($_SESSION['cart_items'][$array_id]);
    $_SESSION['cart_items'] = array_values($_SESSION['cart_items']); // rearranging array after unset
}
