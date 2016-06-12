<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:30
 */
class HomeMockController extends BaseController
{

    public function index(){
        //get mock data
        //$model = new MockModel();
        //$viewData = $model->getMockData();
        //$dataWithID = $model->getMoreMockData();

        //return view
        //$this->APP_Views->getView('home.mockHomePage',['viewData' => $viewData, 'dataWithID' => $dataWithID]);

        //return view & data composer
        $this->APP_Views->getViewComposer('home.mockHomePage');
    }

    public function indexAlternate(){
        //get mock data
        $model = new MockModel();
        $viewData = $model->getMockData();
        $dataWithID = $model->getMoreMockData();

        //return view
        $this->APP_Views->getView('home.mockHomePage',['viewData' => $viewData, 'dataWithID' => $dataWithID]);

    }

    public function viewItem($id){
        // get data from model with the $id
        $model = new MockModel();
        $dataWithID = $model->getMoreMockDataByID($id);
        //return view
        $this->APP_Views->getView('home.mockHomePageViewID',['dataWithID' => $dataWithID]);

    }


}