<?php

function searchArray($keyToSearch, $value, $array) {
    foreach ($array as $key => $val) {
        if ($val[$keyToSearch] === $value) {
            return TRUE;
        }
    }
    return FALSE;
}
