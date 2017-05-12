<?php

namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider { // сервис провайдер БД

    public $serviceName = 'db'; // имя сервис провайдера

    public function init(){ // выполняется при бутстрапинге
        $db = new Connection(); // провайдер создаёт новый объёкт своего сервиса
        $this->di->set($this->serviceName, $db); // сам записывает зависимость сервиса в DI контейнер
    }
}