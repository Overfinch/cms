<?php

namespace Engine\DI;

class DI {

    private $container = []; // здесь хранится DI контейнер

    function set($key, $val){ // записываем зависимости в DI контейнер
        $this->container[$key] = $val;
        return $this;
    }

    function get($key){ // возвращает зависимость с DI контейнера
        return $this->has($key);
    }

    function has($key){ // проверяет наличие зависимости, и возвращает её
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }
}