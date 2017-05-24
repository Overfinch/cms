<?php

namespace Engine\Core\Config;

class Config {

    public static function item($key, $group = 'main'){ // получаем определённый элемент массива определённой группы настроек
        $groupItems = self::file($group);
        return isset($groupItems[$key]) ? $groupItems[$key] : null;
    }

    public static function file($group){ // получаем файл с массивом настройки нужной группы (main, database ...)
        $path = $_SERVER['DOCUMENT_ROOT'].'/'.mb_strtolower(ENV).'/Config/'.$group.'.php';

        if(file_exists($path)){
            $items = require_once($path);
            if (is_array($items)){
                return $items;
            }else{
                throw new \Exception(sprintf('File %s is not array',$path));
            }
        }else{
            throw new \Exception(sprintf('Can not load Config file, file %s does not exist',$path));
        }

        return false;
    }
}