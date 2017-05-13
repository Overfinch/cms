<?php

namespace Engine\Core\Router;

class Router {  // регистрирует роуты и передаёт запрос дальше на UriDispatcher

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
        return $this->getDispatcher()->dispatch($method, $uri); // возвращает созданный DispatchedRoute с нашим url запросом
    }

    public function getDispatcher(){
        if($this->dispatcher == null){
            $this->dispatcher = new UrlDispatcher(); // создаём объект диспатчера

            foreach ($this->routes as $route ){ // регистрируем в диспатчере все роуты (они уже были добавленны)
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }


}