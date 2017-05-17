<?php
// Route list

$this->router->add('home', '/', 'HomeController:index'); // добавляем роуты в роутер
$this->router->add('news', '/news', 'HomeController:newsAll');
$this->router->add('news_single', '/news/(id:int)', 'HomeController:news');