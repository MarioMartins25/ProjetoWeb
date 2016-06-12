<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 16-05-2016
 * Time: 12:47
 */
class DataBinder
{
    // fix data when not defined
    public static function bindData($dataObject){

        if (!isset($dataObject)){
            return '';
        }

        if ($dataObject == null){
            return '';
        }

        return $dataObject;
}


}