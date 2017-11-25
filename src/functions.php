<?php

if (!function_exists('array_map_keys')) {
    function array_map_keys (array $array, callable $callable) : array
    {
        $map = [];

        foreach ($array as $key => $value) {
            $result = $callable($key, $value);

            $map[key($result)] = $result[key($result)];
        }

        return $map;
    }
}