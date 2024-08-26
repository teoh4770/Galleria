<?php

/**
 */

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, "GET");
    }

    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, "POST");
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, "DELETE");
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, "PATCH");
    }

    public function route($uri, $method)
    {
        // based on the routes you have
        // and the route you received from the server

        foreach ($this->routes as $route) {
            if (
                $route["uri"] === $uri &&
                $route["method"] === strtoupper($method)
            ) {
                return require $route["controller"];
            }
        }

        $this->abort();
    }

    public function abort($code = 404)
    {
        // set the response code
        http_response_code($code);

        require "views/{$code}.php";

        die();
    }
}