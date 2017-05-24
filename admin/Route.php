<?php
// Route list Admin

$this->router->add('login', '/admin/login/', 'LoginController:form'); // добавляем роуты в роутер
$this->router->add('dashboard', '/admin/', 'DashboardController:index'); // добавляем роуты в роутер