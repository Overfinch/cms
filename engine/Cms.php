<?php

namespace Engine;

class Cms {

    private $di;

    public function __construct($di){
        $this->di = $di;
    }

    public function run(){
        echo "<pre>";
        echo "Содержимое DI контейнера: <br>";
        print_r($this->di);
        echo "</pre>";
    }
}