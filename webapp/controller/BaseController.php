<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:34
 */
class BaseController
{
    protected $_viewPath;
    protected $APP_Views;


    public function __construct(){
        global $APP_ViewDisp;
        global $APP_ViewFolder;
        $this->APP_Views = $APP_ViewDisp;
        $this->_viewPath = $APP_ViewFolder;
    }



}