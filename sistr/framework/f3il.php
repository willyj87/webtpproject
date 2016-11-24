<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/10/16
 * Time: 11:23
 */
namespace F3il;
define('F3IL','');
if(defined('ROOT_PATH') == false)
    Die ('Access Denied');
if (defined('APPLICATION_PATH') == false)
    Die ('Access Denied');
if (defined('APPLICATION_NAMESPACE')== false)
    Die ('Access Denied');
require_once 'page.php';
require_once 'application.php';
require_once 'configuration.php';
require_once 'error.php';
