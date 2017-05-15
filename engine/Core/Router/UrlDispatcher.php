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

    public function register($method, $pattern, $controller){ // записываем все роуты в роуты диспатчера
        $convertedPattern = $this->convertPattern($pattern); // конвертируем паттрен типа /news/(id:int) в регулярку /news/(?<id>[0-9]+)
        $this->routes[strtoupper($method)][$convertedPattern] = $controller;
    }

    private function convertPattern($pattern){
        if (strpos($pattern,'(') === false){ // если в паттерне нету скобок то возвращаем его нетронутым
            return $pattern;
        }

        // если в паттерне есть скобки, то находим там слова (слово:слово) - например (id:int)
        return preg_replace_callback('#\((\w+):(\w+)\)#',[$this, 'replacePattern'], $pattern);
    }

    private function replacePattern($matches){
        // здесь получаем искомые слова с паттрена, и конвертируем их в регулярку - например (?<id>[0-9]+) переменная и регулярка
        return '(?<'.$matches[1].'>'.strtr($matches[2], $this->patterns).')';
    }

    private function processParam($parameters){ // чистит массив с параметрами
        // функция preg_match() оставляет в массиве лишнюю информацию, мы её удаляем
        // оставляем только те эллементы у которых ключ с именем а не с цифрой
        foreach ($parameters as $key => $val){
            if (is_int($key)){
                unset($parameters[$key]);
            }
        }

        return $parameters;
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

            // если в массиве паттернов роутов есть паттерн который соответствует нашему uri
            // например $pattern = "#^/news/(?<id>[0-9]+)$#s" а $uri = "/news/12"
            // то применяем preg_match() и получаем массив с параметрами
            if(preg_match($pattern, $uri, $parameters)){
                return new DispatchedRoute($controller, $this->processParam($parameters)); // создаём DispatchedRoute и передаём ему имя найденного контроллера и параметры
            }
        }
    }
}