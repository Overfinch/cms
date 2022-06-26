<?php

namespace Engine\Helper;

class Common{
    static function isPost(){ // проверка является ли запрос методом POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            return true;
        }
        return false;
    }

    static function getMethod(){ // возвращает метод запроса
        return $_SERVER['REQUEST_METHOD'];
    }

    static function getPathUrl(){ // возвращает URL запроса
        $pathUrl = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUrl, '?')){ // обрезаем GET данные если есть
            $pathUrl = substr($pathUrl,0,$position);
        }

        return $pathUrl;
    }
}
