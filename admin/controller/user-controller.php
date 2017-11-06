<?php

require_once '../config/site-config.php';
require_once '../model/user.php';
require_once '../service/helper-method.php'; // write some if login check
if (!checkLogin()) {
    header("Location: " . base_url . "/admin/login");
}

if (!isset($_REQUEST['target'])) {
    $result = (new user())->get_admin();
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'addUser') {
    foreach ($_POST as $key => $value) {
        $filteredKey = htmlspecialchars($key);
        $$filteredKey = htmlspecialchars($value);
    }
    if ($pass != $cpass) {
        header("Location: " . base_url . "/admin/users");
    }

    if (!empty($pass) && $pass == $cpass) {
        $col_val = array(
            'username' => $username,
            'email' => $email,
            'pass' => md5($pass)
        );
    }
    $result = (new user())->insert_user($col_val);
    header("Location: " . base_url . "/admin/users");
}


if (isset($_REQUEST['id']) && $_REQUEST['target'] == 'editUser') {
    $id = htmlspecialchars($_REQUEST['id']);
    $result = (new user())->get_single_admin($id);
    $items = $result[0];
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'updateUser') {
    foreach ($_POST as $key => $value) {
        $filteredKey = htmlspecialchars($key);
        $$filteredKey = htmlspecialchars($value);
    }

    if ($pass != $cpass) {
        header("Location: " . base_url . "/admin/users");
    }

    if (!empty($pass) && $pass == $cpass) {
        $col_val = array(
            'username' => $username,
            'email' => $email,
            'pass' => md5($pass)
        );
    }

    if (empty($pass) && empty($cpass)) {
        $col_val = array(
            'username' => $username,
            'email' => $email
        );
    }
    $result = (new user())->update_user($col_val, $user_id);
    header("Location: " . base_url . "/admin/users");
}

if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'deleteUser') {
    $user_id = htmlspecialchars($_GET['id']);
    $result = (new user())->delete_user("id", $user_id);
    if ($result) {
        header("Location: " . base_url . "/admin/users");
    }
}
