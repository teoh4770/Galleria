<?php

global $images;

$title = "Homepage";

$result =  array_filter($images, function ($image) {
    return $image['name'] === "Girl with a Pearl Earring";
});

require view("index.view.php");