<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:19
 */
class Router
{
    private $_URLBase = '';
    private $_route = '';
    private $_action = '';
    private $_id = '';
    private $_parseDelimeter = '';
    private $_getRouteTable;
    private $_postRouteTable;
    private $_anyRouteTable;

    public function __construct($URLBase, $parseDelimeter = '@') {

        if ($routeURLBase = ''){
            echo 'ROUTER ERROR: BaseURL for router not provided. Please provide in Router class Constructor';
            die();
        }

        $this->_URLBase = $URLBase;
        $this->_parseDelimeter = $parseDelimeter;
    }

    public function parseURLRoute(){

        if (trim($this->_parseDelimeter) == ''){
            echo 'ROUTER ERROR: Parsing delimeter for router not provided. Please provide in Router class Constructor';
            die();
        }

        if(!isset($_GET["route"])) {
            //echo 'ROUTER ERROR: Route not defined.';
            //die();
        } else {
            if (trim($_GET["route"]) == '') {
                //echo 'ROUTER ERROR: Route not defined.';
                //die();
            }
        }

        if(isset($_GET["id"])){
            if (trim($_GET["id"]) == ''){
                echo 'ROUTER ERROR: ID in Route not defined.';
                die();
            } else {
                $this->_id = trim($_GET["id"]);
            }
        }

        $this->parseRequestRoute();

    }

    public function routeNotDefined(){
        if ($this->_route == ''){
            return true;
        } else {
            return false;
        }
    }

    public function routeHasID(){
        if ($this->_id == ''){
            return false;
        } else {
            return true;
        }
    }

    private function parseRequestRoute(){

        if (isset($_GET["route"]) && isset($_GET["action"])){

            $this->_route = trim($_GET["route"]);

            $this->_action = trim($_GET["action"]);
        }
        // TODO parse ID
    }

    public function buildURL($route, $id = ''){

        if (trim($route == '')){
            echo 'ROUTER ERROR: Unable to build route. Route is missing.';
            die();
        }

        $strToken = explode($this->_parseDelimeter,trim($route));

        if (trim($strToken[0]) == ''){
            echo 'ROUTER ERROR: Route is empty.';
            die();
        }

        if (trim($strToken[1]) == '') {
            echo 'ROUTER ERROR: Action is empty.';
            die();
        }

        $URLRoute = $this->_URLBase . '?route=' . $strToken[0] . '&action=' . $strToken[1];

        if (!$id == ''){
            $URLRoute = $URLRoute . '&id=' . $id;
        }

        return $URLRoute;
    }

    public function getRoute(){
        return $this->_route;
    }

    public function getAction(){
        return $this->_action;
    }

    public function getID(){
        return $this->_id;
    }

    public function __toString() {
        return ('[' . __CLASS__ . ' Class instance] : _URLBase = ' . $this->_URLBase);
    }

    public function get($route, $controllerAction = ''){
        if ($controllerAction == ''){
            $this->_getRouteTable[$route] = $route;
        } else {
            $this->_getRouteTable[$route] = $controllerAction;
        }
    }

    public function post($route, $controllerAction  = ''){
        if ($controllerAction == ''){
            $this->_postRouteTable[$route] = $route;
        } else {
            $this->_postRouteTable[$route] = $controllerAction;
        }
    }

    public function any($route, $controllerAction  = ''){
        if ($controllerAction == ''){
            $this->_anyRouteTable[$route] = $route;
        } else {
            $this->_anyRouteTable[$route] = $controllerAction;
        }
    }

    public function matchRouterRules($routerTable, $requestMethod){
        // TODO check routing rules and return http method if found, else return null
    }


    public function routeNow(){
        $requestMethod = '';
        $anyRoute = false;
        $this->parseRequestRoute();

        // get request type
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestMethod = 'post';
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $requestMethod = 'get';
        }

        // Get matching URL in routing rules

        $controller = $this->getRoute();
        $actionMethod = $this->getAction();
        $fullRouteName = $controller . $this->_parseDelimeter . $actionMethod;

        if ($requestMethod == 'get') {
            if ($this->_getRouteTable == !null) {
                //var_dump($this->_getRoutes);
                if (array_key_exists($fullRouteName, $this->_getRouteTable)) {
                    $routingRule = explode($this->_parseDelimeter, $this->_getRouteTable[$fullRouteName]);
                } else {
                    $anyRoute = true;
                }
            }
        }

        if ($requestMethod == 'post') {
            if ($this->_postRouteTable == !null) {
                //var_dump($this->_postRoutes);
                if (array_key_exists($fullRouteName, $this->_postRouteTable)) {
                    $routingRule = explode($this->_parseDelimeter, $this->_postRouteTable[$fullRouteName]);
                } else {
                    $anyRoute = true;
                }
            }
        }

        //TODO check when both post & get are missing

        //var_dump($anyRoute);

        if ($anyRoute){
            if ($this->_anyRouteTable == !null) {
                //var_dump($this->_anyRoutes);
                if (array_key_exists($fullRouteName, $this->_anyRouteTable)) {
                    $routingRule = explode($this->_parseDelimeter, $this->_anyRouteTable[$fullRouteName]);
                    //var_dump($routingRule);
                } else {
                    echo 'ROUTER ERROR: URL Route mismatch. No [' . $fullRouteName . '] rule for ' . $_SERVER['REQUEST_METHOD'] . ' Request method' ;
                    die();
                }
            } else {
              
                echo 'ROUTER ERROR: URL Route mismatch. No [' . $fullRouteName . '] rule for ' . $_SERVER['REQUEST_METHOD'] . ' Request method' ;
                die();
            }
        }


        // TODO check routing rules
        //var_dump($routingRule);

        // invoke method on controller
        //TODO validate
        $controllerClassName = $routingRule[0];
        $methodInstanceName = $routingRule[1];

        // TODO post & any


        //TODO check for ID and fetch
        // TODO Check if class exists

        $controllerInstance = new $controllerClassName();


        // TODO check if method exists

        if ($this->routeHasID()) {
            $controllerInstance->$methodInstanceName($this->getID());
        } else {
            $controllerInstance->$methodInstanceName();
        }
    }

}
