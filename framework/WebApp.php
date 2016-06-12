<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 16-05-2016
 * Time: 14:23
 */
class WebApp
{
    Public $Router;
    public $ViewDispatcher;

    public function __construct($routerObject, $viewDispatcherObject){
        $this->Router = $routerObject;
        $this->ViewDispatcher = $viewDispatcherObject;

    }

}