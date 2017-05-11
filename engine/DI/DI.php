<?php

namespace Engine\DI;

class DI {
    private $container = [];

    function set($key, $val){
        $this->container[$key] = $val;
        return $this;
    }

    function get($key){
        return $this->has($key);
    }

    function has($key){
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }
}