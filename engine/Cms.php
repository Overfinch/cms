<?php

namespace Engine;

use Engine\DI\DI;

class Cms {

    private $di; // DI контейнер
    public $router; // Роутер

    public function __construct(DI $di){ // получаем готовый DI контейнер с зависимостями
        $this->di = $di;
        $this->router = $this->di->get('router'); // получаем объект класса Router из DI контейнера
    }

    public function run(){
        //$this->router->add('home', '/', 'HomeController:index');
        //$routerDispatch = $this->router->dispatch('GET', );

        echo "<pre>";
            print_r($this->di);
        echo "</pre>";
    }
}