<?php

namespace Engine;

use Engine\DI\DI;

class Cms {

    private $di;
    public $router;

    public function __construct(DI $di){ // получаем готовый DI контейнер с зависимостями
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function run(){
        $this->router->add('home', '/', 'HomeController:index');
        echo "<pre>";
        print_r($this->di);
        echo "</pre>";
    }
}