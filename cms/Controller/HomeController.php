<?php

namespace Cms\Controller;

class HomeController extends CmsController {

    public function index(){
        echo 'Index Page';
    }

    public function newsAll(){
        echo "All news";
    }

    public function news($id){
        echo 'News - '.$id;
    }
}