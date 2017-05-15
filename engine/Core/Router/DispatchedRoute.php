<?php

namespace Engine\Core\Router;

use Engine\DI\DI;

class DispatchedRoute{

    private $controller;
    private $parameters;

    function __construct($controller, $parameters = []){ // принимает имя найденного контроллера и его метода и параметры
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController() // возвращает имя найденного контроллера и его метода
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParameters(): array // возвращает параметры для найденного контроллера
    {
        return $this->parameters;
    }

}