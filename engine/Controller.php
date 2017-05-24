<?php

namespace Engine;

use Engine\Core\Template\View;
use Engine\DI\DI;

abstract class Controller { // абстрактный класс контроллера

    /**
     * @var DI;
     */
    protected $di; // DI контейнер

    /**
     * @var Core\Database\Connection
     */
    protected $db;  // объект класса отвечающий за БД
    
    /**
     * @var View;
     */
    protected $view; // объект класса отвечающий за шаблонизатор

    protected $config; // массив с конфигами

    public function __construct(DI $di){
        $this->di = $di;
        $this->view = $this->di->get('view'); // берём view из DI и записываем его в отдельное свойство
        $this->config = $this->di->get('config'); // берём config из DI и записываем его в отдельное свойство
    }
}