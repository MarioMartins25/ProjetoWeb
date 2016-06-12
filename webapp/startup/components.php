<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-05-2016
 * Time: 14:05
 */

# include the ActiveRecord library
require_once $APP_VendorFolder . "php-activerecord\\ActiveRecord.php";

ActiveRecord\Config::initialize(function($cfg)
{
    global $DBconnections;
    global $APP_ModelFolder;
    global $currentEnvironment;
    $cfg->set_model_directory($APP_ModelFolder);
    $cfg->set_connections($DBconnections);
    $cfg->set_default_connection($currentEnvironment);
});
