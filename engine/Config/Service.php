<?php
// сервис провайдеры которые автоматически будут инициализарованны при бутстраппинге
return [
    \Engine\Service\Database\Provider::class,
    \Engine\Service\Router\Provider::class,
    \Engine\Service\View\Provider::class
];