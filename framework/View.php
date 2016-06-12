<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 16-05-2016
 * Time: 14:35
 */
class View
{
    public $WebAsset;
    public $Layout;

    public function __construct($webAssetObject, $layoutObject){
        $this->WebAsset = $webAssetObject;
        $this->Layout = $layoutObject;
    }

}