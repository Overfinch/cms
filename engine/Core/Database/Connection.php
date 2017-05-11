<?php

namespace Engine\Core\Database;

class Connection {

    private $link; // тут будет хранится PDO объект

    function __construct(){
        $this->connect();
    }

    private function connect(){
        $config = require_once('config.php'); // получаем массив конфигрураций

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
        $this->link = new \PDO($dsn,$config['username'],$config['password']); // инициализируем PDO
        return $this;
    }

    public function  execute($sql){ // выполняет SQL зпрос
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query($sql){ // выполняет SQL зпрос и возвращает результат
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false){
            return [];
        }

        return $result;
    }
}