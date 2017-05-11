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
        if (isset($this->container[$key])){
            return $this->container[$key];
        }else{
            return false;
        }
    }
}