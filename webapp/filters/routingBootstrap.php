<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 16-05-2016
 * Time: 12:37
 */
$APP_Router->parseURLRoute();

if ($APP_Router->routeNotDefined()){
    header('Location: router.php?route=auth&action=index');
    return;
}

// prepare variables for routing rules
$action = $APP_Router->getAction();
$route = $APP_Router->getRoute();

//TODO get ID if any
//employ ID in routing tables
