<?php

namespace Engine;

use Engine\DI\DI;
use Engine\Helper\Common;

class Cms {

    private $di; // DI контейнер
    public $router; // Роутер

    public function __construct(DI $di){ // получаем готовый DI контейнер с зависимостями
        $this->di = $di;
        $this->router = $this->di->get('router'); // получаем объект класса Router из DI контейнера
    }

    public function run(){
        $this->router->add('home', '/', 'HomeController:index'); // добавляем роуты в роутер
        $this->router->add('product', '/user/12', 'ProductController:index');

        // передаём метод(GET/POST...) и url
        // получаем объект DispatchedRoute с именем контроллера и параметрами
        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());


        echo "<pre>";
        print_r($routerDispatch);
            print_r($this->di);
        echo "</pre>";
    }
}