<?php

namespace Engine\Core\Router;

class DispatchedRoute{

    private $controller;
    private $parameters;

    function __construct($controller, $parameters = []){ // принимает имя найденного контроллера и параметры
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}