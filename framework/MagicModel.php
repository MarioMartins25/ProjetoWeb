<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 12-05-2016
 * Time: 13:00
 */
class MagicModel
{
    protected $table;
    protected $id = 'id';

    public function __construct(){
        $this->table = __CLASS__;

    }

}