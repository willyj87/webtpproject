<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/10/16
 * Time: 11:23
 */
define('SISTR','');
define('ROOT_PATH', __DIR__);
define('APPLICATION_PATH', ROOT_PATH.'/application');
define('APPLICATION_NAMESPACE', 'Sistr');
require_once 'framework/f3il.php';
$app = \F3il\Application::getInstance(APPLICATION_PATH.'/configuration.ini');
$app->run();