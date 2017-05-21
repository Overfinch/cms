<?php

namespace Cms\Controller;

class HomeController extends CmsController {

    public function index(){
        $data = ['name' => 'Sergey'];
        $this->view->render('index', $data); // просим View отрендерить шаблон index
    }

    public function newsAll(){
        echo "All news";
    }

    public function news($id){
        echo 'News - '.$id;
    }
}