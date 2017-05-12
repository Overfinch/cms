<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    private $methods = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    public function addPattern($key, $pattern){
        $this->patterns[$key] = $pattern;
    }

    private function routes($method){
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    public function dispatch($method, $uri){ // принимает метод передачи(POST/GET...) и uri
        $routes = $this->routes(strtoupper($method)); // получаем все роуты нужного метода(POST/GET...)

        if(array_key_exists($uri, $routes)){ // проверяет наличие такого uri в роутах
            return new DispatchedRoute($routes[$uri]); // создаём DispatchedRoute и передаём ему имя контроллера
        }
    }

    private function doDispatch($method, $uri){
        foreach($this->routes($method) as $route => $controller){
            print $route;
        }
    }
}