<?php

namespace Engine\Service\View;

use Engine\Core\Template\View;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider{

    public $name = 'view';

    public function init(){
        $view = new View();
        $this->di->set($this->name,$view);
    }
}