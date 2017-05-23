<?php

namespace Engine;

use Cms\Controller\HomeController;
use Engine\Core\Router\DispatchedRoute;
use Engine\DI\DI;
use Engine\Helper\Common;

class Cms {

    private $di; // DI контейнер
    public $router; // Роутер

    public function __construct(DI $di){ // получаем готовый DI контейнер с зависимостями
        $this->di = $di;
        $this->router = $this->di->get('router'); // получаем объект класса Router из DI контейнера
    }

    public function run(){

        try{

            require_once(__DIR__.'/../'.mb_strtolower(ENV).'/Route.php'); // подключаем файл с роутами (константа ENV отвечает за окружение (Cms\, Admin\ ...))

            // передаём метод(GET/POST...) и url
            // получаем объект DispatchedRoute с именем контроллера и параметрами
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == null){ // если не найден нужный контроллер и метод, то вызываем контроллер 404
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($className, $actionName) = explode(":", $routerDispatch->getController(), 2); // получаем имя контроллера и имя метода
            $controllerName = ENV.'\\Controller\\'.$className; // добавляем нэймспейсы (константа ENV отвечает за окружение (Cms\, Admin\ ...))
            $parameters = $routerDispatch->getParameters(); // получаем параметры

            // создаём объект класса нужного контроллера, передаём ему DI, вызываем нужный метод и передаём ему параметры
            call_user_func_array([new $controllerName($this->di), $actionName], $parameters);

        }catch (\ErrorException $e){
            echo $e->getMessage();
            exit;
        }

    }
}