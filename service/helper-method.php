<?php

function searchArray($keyToSearch, $value, $array) {
    foreach ($array as $key => $val) {
        if ($val[$keyToSearch] === $value) {
            return TRUE;
        }
    }
    return FALSE;
}

function checkLogin() {
    session_start();
    if (empty($_SESSION['username']) || !isset($_SESSION['username'])) {
        return FALSE;
    } else {
        return TRUE;
    }
}
