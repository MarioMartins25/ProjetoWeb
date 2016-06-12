<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 10-05-2016
 * Time: 14:04
 */
class WebAsset
{
    protected $_publicBaseURL;

    public function __construct($publicBaseURL){
        $this->_publicBaseURL = $publicBaseURL;
    }

    public function CSSFileURL($filenameCSS){
        return $this->_publicBaseURL . 'css/' . $filenameCSS;
    }

    public function JavascriptFileURL($filenameJS){
        return $this->_publicBaseURL . 'js/' . $filenameJS;
    }

    public function ImageFileURL($filenameImage){
        return $this->_publicBaseURL . 'images/' . $filenameImage;
    }
}