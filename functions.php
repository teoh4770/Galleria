<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function parseJson($path)
{
    $json = file_get_contents(base_path($path)) ?? "";

    return json_decode($json, true);
}

function save($value, $filename)
{
    $value = json_encode($value, JSON_PRETTY_PRINT);

    return file_put_contents(base_path($filename), $value);
}

function redirect($url)
{
    header("Location: {$url}");
    exit();
}

function view($path)
{
    return base_path("views/{$path}");
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

/**
 * Get the first matched item from the filtered array
 * @param array $array
 * @param callable|null $callback
 */
function array_find(array $array, ?callable $callback = null) {
    $result = array_filter($array, $callback);

    return $array[array_key_first($result)] ?? null;
}

/**
 * functions for lightbox navigation
 */

function previous_step(int $current, int $total) {
    $result = $current - 1;

    return $result < 0 ? $total - 1 : $result;
}

function next_step(int $current, int $total) {
    return ($current + 1) % $total;
}

/**
 *
 * ((int)$id - 1) < 0 ? (count($images) - 1) : (int)$id - 1
 */