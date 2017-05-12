<?php

namespace Engine\Core\Router;

class Router {

    private $routes = [];
    private $host;

    public function __construct($host){
        $this->host = $host;
    }

    public function add($key, $pattern, $controller, $method = 'GET'){
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }


}