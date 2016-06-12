<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 10-05-2016
 * Time: 13:45
 */
class DataComposer
{
    protected $_viewData='';

    public function __construct($viewData){
        foreach ($viewData as $key => $data){
            $this->_viewData[$key] = $data;
        }
    }

    public function getDataForView($key){
        //TO DO Validate key existence
        return $this->_viewData[$key];
    }

}