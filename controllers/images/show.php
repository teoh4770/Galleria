<?php

global $images;

$id = (int) $_GET["id"];

$image = array_find($images, function ($image) use ($id) {
    return (int) $image["id"] === $id;
});

if (! $image) {
    abort();
}

require view("images/show.view.php");