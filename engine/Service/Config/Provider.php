<?php

namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;

class Provider extends AbstractProvider { // сервис провайдер БД

    public $serviceName = 'config'; // имя сервис провайдера

    public function init(){ // выполняется при бутстрапинге

        $config['main'] = Config::file('main'); // получаем главные настройки настройки
        $config['database'] = Config::file('database'); // получаем настройки БД

        $this->di->set($this->serviceName, $config); // сам записывает зависимость сервиса в DI контейнер
    }
}