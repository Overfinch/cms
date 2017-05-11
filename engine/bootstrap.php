<?php

require_once(__DIR__.'/../vendor/autoload.php'); // подключаем автозагрузчик PSR-4

use Engine\Cms;
use Engine\DI\DI;

try{
    $di = new DI(); // создаём объект DI контейнера

    $services = require_once(__DIR__.'/Config/Service.php'); // получаем массив с ссылками на классы сервиспровайдеров
    foreach ($services as $service){
        $provider = new $service($di); // создаём объект
        $provider->init(); // провайдер сам запишет зависимость в DI контейнер

    }

    $cms = new Cms($di);
    $cms->run();

}catch (ErrorException $e){
    echo $e->getMessage();
}