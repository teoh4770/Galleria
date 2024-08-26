<?php

global $router;

// Homepage
$router->get("/", "controllers/index.php");

// Gallery
$router->get("/images", "controllers/images/index.php");
// Get a single image
$router->get("/image", "controllers/images/show.php");
