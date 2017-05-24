<?php

namespace  Engine\Core\Template;

class View {

    protected $theme;

    function __construct(){
        $this->theme = new Theme(); // создаём объект который отвечает за темы и генерацию эллементов типа (header, footer...)
    }

    public function render($template, $vars = []){ // принимаем имя шаблона переменные

        $templatePath = $this->getTemplatePath($template,ENV); // получаем путь к шаблону

        if (!is_file($templatePath)){ // проверяем наличие шаблона в папке
            throw new \InvalidArgumentException(
                sprintf('Template"%s" not found in "%s"', $template, $templatePath)
            );
        }

        $this->theme->setData($vars); // передаём массив с данными в тему
        extract($vars); // получаем переменные из массива

        ob_start(); // включаем буфферизацию
        ob_implicit_flush(0); // отключаем неявную очистку

        try{
            require_once($templatePath);
        }catch (\ErrorException $e){
            ob_end_clean(); // если не выходит загрузить шаблон, чистим и закрываем буффер
            echo $e->getMessage();
        }

        echo ob_get_clean(); // получаем всё что было в буффере, выводим на экран, и очищаем буффер

    }

    public function getTemplatePath($template, $env = null){
        if($env == 'Cms'){
            return ROOT_DIR.'/content/themes/default/'.$template.'.php';
        }
        return ROOT_DIR.'/View/'.$template.'.php';
    }
}