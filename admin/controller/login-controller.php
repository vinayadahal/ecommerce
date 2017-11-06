<?php

session_start();

if (!empty($_POST)) {
    require_once '../config/site-config.php';
    require_once '../model/user.php';
    foreach ($_POST as $key => $value) {
        $filteredKey = htmlspecialchars($key);
        $$filteredKey = htmlspecialchars($value);
    }
    $result = (new user())->login_single_admin($username, md5($pass));
    $_SESSION['username'] = $result[0]['username'];
    header("Location: " . base_url . "/admin/");
}


if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'logoutUser') {
    require_once '../../config/site-config.php';
    unset($_SESSION['username']);
    session_destroy();
    header("Location: " . base_url . "/admin/login");
}
