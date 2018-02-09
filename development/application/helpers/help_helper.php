<?php

function get_array_values(array $array, array $keys) : array{
    $return_array = [];
    foreach ($keys as $key) {
        $return_array[$key] = isset($array[$key]) ? $array[$key] : null;
    }
    return $return_array;
}