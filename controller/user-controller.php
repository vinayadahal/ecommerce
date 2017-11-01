<?php

require_once '../config/site-config.php';
session_start();

$_SESSION['customer_detail'] = array();
foreach ($_POST as $key => $value) {
    $filteredKey = htmlspecialchars($key);
    $$filteredKey = htmlspecialchars($value);
}

$customer = array(
    'firstname' => $firstname,
    'lastname' => $lastname,
    'email' => $email,
    'phone' => $phone,
    'address' => $address,
    'username' => $uname,
    'password' => md5($cpass)
);
array_push($_SESSION['customer_detail'], $customer); //pushes new element to array
header("Location: " . base_url . "/payment-method/");
