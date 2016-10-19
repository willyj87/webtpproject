<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/10/16
 * Time: 09:51
 */
define('SECURITE',true);
require_once 'groupe.php';
require_once 'utilisateur.php';

$heure = date("h:i:s");
require 'apparence.php';

$will = new Utilisateurs("willy", "junior");
$will->direBonjour();


require 'apparence.php';