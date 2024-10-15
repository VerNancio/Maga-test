<?php

// namespace App\helpers;

function is_phone_valid($phone) 
{

    $len = strlen($phone);
    $is_len_valid = ($len < 10 || $len > 11);

    if ($is_len_valid || !is_numeric($phone)) {
        return false;
    }

    return true;
}
