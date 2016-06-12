<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 16-05-2016
 * Time: 14:10
 */
class Layout
{
    protected $_viewBaseFolder;
    protected $_viewExtension;
    protected $_composerExtension = 'composer';

    public function __construct($viewBaseFolder, $viewExtension){
        $this->_viewBaseFolder = $viewBaseFolder;
        $this->_viewExtension = $viewExtension;
    }

    public function includeTemplate($subViewName){
        $subViewName = str_replace('.', '\\', $subViewName);

        require('view\\viewObjectInjector.php');

        // if a composer exists include it
        if (file_exists($this->_viewBaseFolder . '\\' . $subViewName . '.' . 'composer' . '.php')){
            require_once($this->_viewBaseFolder . '\\' . $subViewName . '.' . 'composer' . '.php');
        }

        require_once($this->_viewBaseFolder . '\\' . $subViewName . '.' . $this->_viewExtension . '.php');
    }

}