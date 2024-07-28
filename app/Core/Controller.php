<?php

trait Controller {

    // Xây dựng phương thức để require model vào controller để thao tác với DB
    function model($model) {
        if (file_exists('./app/Models/'.$model.'.php')) {
            require_once "./app/Models/".$model.".php";
            return new $model;
        }
    }   

    function view($view,$data = []) {
        $view = str_replace('.','/',$view);
        if(file_exists('./app/Views/'.$view.'.php')) {
            require_once "./app/Views/".$view.".php";
        }
    }
}

?>