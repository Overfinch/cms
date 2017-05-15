<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller{ // абстрактный класс контроллера

    /**
     * @var DI;
     */
    protected $di;
    protected $db;

    public function __construct(DI $di){
        $this->di = $di;
    }
}