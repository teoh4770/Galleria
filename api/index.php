<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "functions.php";
require base_path("Router.php");

$router = new Router();
$routes = require base_path("routes.php");

$images = parseJson("api/data.json");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_SERVER["REQUEST_METHOD"];

// based on both path and request method
// provide the corresponding controller
$router->route($uri, $method);

