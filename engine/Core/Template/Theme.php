<?php

namespace Engine\Core\Template;

class Theme{

    const RULES_NAME_FILE = [ // массив для генерации имён файлов
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s'
    ];

    public $url = '';
    protected $data = []; // сюда попадут данные которые передаются в обычный шаблон

    public function header($name = null){ // метод для файла подключения хэдера
        $name = (string) $name;
        $file = 'header'; // имя файла по умолчанию

        if ($name != ''){
            $file = sprintf(self::RULES_NAME_FILE['header'], $name); // подставляем название, в имя файла
        }

        $this->loadTemplateFile($file); // загружаем файл
    }

    public function footer($name = ''){ // метод для подключения файла футера
        $name = (string) $name;
        $file = 'footer'; // имя файла по умолчанию

        if ($name != ''){
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name); // подставляем название, в имя файла
        }

        $this->loadTemplateFile($file); // загружаем файл
    }

    public function sidebar($name = ''){ // метод для подключения файла сайдбара
        $name = (string) $name;
        $file = 'sidebar'; // имя файла по умолчанию

        if ($name != ''){
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name); // подставляем название, в имя файла
        }

        $this->loadTemplateFile($file); // загружаем файл
    }

    public function block($name = '', $data = []){ // метод для подключения файла блока
        $name = (string) $name;
        if ($name != ''){
            $this->loadTemplateFile($name, $data); // загружаем файл
        }
    }

    private function loadTemplateFile($nameFile, $data = []){
        $templateFile = ROOT_DIR.'/content/themes/default/'.$nameFile.'.php';

        if (file_exists($templateFile)){
            extract($data);
            require_once($templateFile);
        }else{
            throw new \Exception(sprintf('Файл %s не найден <br>',$templateFile));
        }
    }

    /**
     * @return array
     */
    public function getData(): array // запись данных которые передаются в обычный шаблон (что бы они были доступны и тут)
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data) // вывод данных которые передаются в обычный шаблон
    {
        $this->data = $data;
    }
}