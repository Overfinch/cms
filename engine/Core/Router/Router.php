<?php

namespace Engine\Core\Router;

class Router {

    private $routes = [];
    private $host;
    private $dispatcher;

    public function __construct($host){
        $this->host = $host;
    }

    public function add($key, $pattern, $controller, $method = 'GET'){ // добавляет роут в массив
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch($method, $uri){ // сейчас вызывается в Cms->run();

    }

    public function getDispatcher(){
        if($this->dispatcher == null){

        }

        return $this->dispatcher;
    }


}