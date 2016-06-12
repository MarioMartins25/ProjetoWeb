<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:52
 */
class ViewDispatcher
{
    protected $_viewBaseFolder;
    protected $_viewExtension;
    public $dataComposer;

    public function __construct($viewBaseFolder, $viewExtension){
        $this->_viewBaseFolder = $viewBaseFolder;
        $this->_viewExtension = $viewExtension;
    }

    public function getView($viewName, $viewData){
        // TODO validate $viewData (must be an associative array)
        $this->dataComposer = new DataComposer($viewData);
        $viewName = str_replace('.', '\\', $viewName);
        require_once('view\\viewObjectInjector.php');

        // if a composer exists include it
        if (file_exists($this->_viewBaseFolder . '\\' . $viewName . '.' . 'composer' . '.php')){
            require_once($this->_viewBaseFolder . '\\' . $viewName . '.' . 'composer' . '.php');
        }

        require_once($this->_viewBaseFolder . '\\' . $viewName . '.' . $this->_viewExtension . '.php');
    }

    public function getViewComposer($viewName){
        $viewName = str_replace('.', '\\', $viewName);
        require_once('view\\viewObjectInjector.php');

        // check if a composer exists (mandatory!)
        if (file_exists($this->_viewBaseFolder . '\\' . $viewName . '.' . 'composer' . '.php')){
            require_once($this->_viewBaseFolder . '\\' . $viewName . '.' . 'composer' . '.php');
        } else {
            echo 'View composer [' . $this->_viewBaseFolder . '\\' . $viewName . '.' . 'composer' . '.php' .  '] not found';
        }

        require_once($this->_viewBaseFolder . '\\' . $viewName . '.' . $this->_viewExtension . '.php');
    }

}