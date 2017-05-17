<?php

namespace  Engine\Core\Template;

class View{

    function __construct(){

    }

    public function render($template, $vars = []){
        $templatePath = ROOT_DIR.'/content/themes/default/'.$template.'.php'; // получаем путь к шаблону

        if (!is_file($templatePath)){ // проверяем наличие шаблона в папке
            throw new \InvalidArgumentException(
                sprintf('Template"%s" not found in "%s"', $template, $templatePath)
            );
        }

        extract($vars); // получаем переменные из массива

        ob_start(); // включаем буфферизацию
        ob_implicit_flush(0); // отключаем неявную очистку

        try{
            require_once($templatePath);
        }catch (\ErrorException $e){
            ob_end_clean(); // отменяем буфферизацию
            echo $e->getMessage();
        }

        echo ob_get_clean(); // получаем всё что было в буффере, выводим на экран, и очищаем буффер
    }
}