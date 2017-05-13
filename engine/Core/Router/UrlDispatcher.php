<?php

namespace Engine\Core\Router;

class UrlDispatcher // находит нужный роут(и имя контроллера) по нашему запросу, и передаёт его в DispatchedRoute
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

    public function register($method, $pattern, $controller){ // записываем в роуты диспатчера
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    public function dispatch($method, $uri){ // принимает метод передачи(POST/GET...) и uri
        $routes = $this->routes(strtoupper($method)); // получаем все роуты нужного метода(POST/GET...)

        if(array_key_exists($uri, $routes)){ // проверяет наличие такого uri в роутах
            return new DispatchedRoute($routes[$uri]); // создаём DispatchedRoute и передаём ему имя найденного контроллера
        }

        return $this->doDispatch($method, $uri); // если такого uri нету в роутах, то перебераем регуляркой
    }

    private function doDispatch($method, $uri){
        foreach($this->routes($method) as $route => $controller){ // перебераем все роуты нужного метода
            $pattern = '#^'. $route . '$#s'; // паттерн с uri

            if(preg_match($pattern, $uri, $parameters)){ // если в массиве роутов есть uri который соответствует нашему uri
                return new DispatchedRoute($controller, $parameters); // создаём DispatchedRoute и передаём ему имя найденного контроллера и параметры
            }
        }
    }
}