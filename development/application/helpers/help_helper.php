<?php

function get_array_values(array $array, array $keys) : array{
    $return_array = [];
    foreach ($keys as $key) {
        $return_array[$key] = isset($array[$key]) ? $array[$key] : null;
    }
    return $return_array;
}

function is_int_string($value) {
    return is_numeric($value) && ((int) $value == $value);
}