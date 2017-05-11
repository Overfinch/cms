<?php

namespace Engine\Service;

use Engine\DI\DI;

abstract class AbstractProvider {  // абстрактный класс сервис провайдера
    protected $di;

    function __construct(DI $di){ // все сервис провайдеры при создании записывают себе ссылку на DI контейнер
        $this->di = $di;
    }

    abstract function init(); // у каждого сервис провайдера должен быть метод инициализации
}