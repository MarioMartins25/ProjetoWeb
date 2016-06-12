<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 12:08
 */
class MockModel extends MagicModel
{

    public function getMockData() {
        return array('HomeMockController', 'MockModel', 'home.mockHomepage');
    }

    public function getMoreMockData(){
        return array('200'=>'DBValue with ID=200', '300'=>'DBValue with ID=300', '400'=>'DBValue with ID=400');
    }

    public function getMoreMockDataByID($id){
        return [$id => 'DBValue with ID=' . $id];
    }
}