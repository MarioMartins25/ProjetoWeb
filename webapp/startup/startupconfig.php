<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 12:09
 */

/**
 * APP configs
 */
$APP_BaseURL = 'http://localhost/projetov3/ProjetoWeb/';

$APP_MapPath = __DIR__;
$APP_ViewFolder = $APP_MapPath . "\\..\\view\\";
$APP_VendorFolder = $APP_MapPath . "\\..\\..\\vendor\\";
$APP_ModelFolder = $APP_MapPath . "\\..\\model\\";

$APP_Router;

$APP_PublicURL = $APP_BaseURL . 'public/';
$APP_templateExtension = 'tpl';

/**
 * Autoloader Setup (framework autoload)
 */
$autoloadFolders = array(
    'framework' => $APP_MapPath . "\\..\\..\\framework\\",
    'controller' => $APP_MapPath . "\\..\\controller\\",
    'model' => $APP_MapPath . "\\..\\model\\",
);

include_once('autoloader.php');

/**
 * Database Connection configs
 */
$DB_servername = 'localhost';
$DB_username = 'username';
$DB_password = 'password';
$DB_DatabaseName = 'databasename';

/**
 * Create Framework Classes
 */
$APP_Router = new Router($APP_BaseURL . 'webapp/router.php');
$APP_ViewDisp = new ViewDispatcher($APP_ViewFolder, $APP_templateExtension);

$APP_WebAsset = new WebAsset($APP_PublicURL);
$APP_Layout = new Layout($APP_ViewFolder, $APP_templateExtension);

$APP = new WebApp($APP_Router, $APP_ViewDisp);
$APPView = new View($APP_WebAsset, $APP_Layout);

/**
 *  Import third-party components
 */
include_once('environment.php');
include_once('components.php');
