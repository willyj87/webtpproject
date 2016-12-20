<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/12/16
 * Time: 07:55
 */
define('3INEWS','');
define('ROOT_PATH', __DIR__);
define('APPLICATION_PATH', ROOT_PATH.'/application');
define('APPLICATION_NAMESPACE', 'inews');
require_once 'framework/f3il.php';
$app = \F3il\Application::getInstance(APPLICATION_PATH.'/configuration.ini');
$app->setDefaultControllerName('index');
$app->setAuthenticationDelgate('UtilisateurModel');
$app->run();