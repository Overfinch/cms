<?php

namespace Engine\Service\Router;

use Engine\Core\Router\Router;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider { // сервис провайдер Роутинга

    public $name = 'router'; // имя сервис провайдера

    public function init(){ // выполняется при бутстрапинге
        $router = new Router('http://cms.loc/'); // провайдер создаёт новый объёкт своего сервиса
        $this->di->set($this->name, $router); // сам записывает зависимость сервиса в DI контейнер
    }
}