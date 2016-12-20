<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/10/16
 * Time: 11:23
 */
namespace F3il;
session_start();
define('F3IL','');
if(defined('ROOT_PATH') == false)
    Die ('Access Denied');
if (defined('APPLICATION_PATH') == false)
    Die ('Access Denied');
if (defined('APPLICATION_NAMESPACE')== false)
    Die ('Access Denied');
require_once 'autoloader.php';
AutoLoader::getInstance(APPLICATION_PATH,APPLICATION_NAMESPACE);