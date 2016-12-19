<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:23
 */
namespace Sistr;
defined('SISTR') or die('Acces Denied');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>SisTR - Accueil</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/sistr.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans | Roboto:100,100i,400,400i">
</head>
<body>
<header id="header-accueil">
    <div class="conteneur">
        <h1>
            <a href="#">
                <img src="images/logo-grand.png" alt="logo sistr">
            </a>
        </h1>
        <div id="connexion">
            <div id="val-msg">
                [%MESSAGES%]
            </div>
           <?php $this->login->render();?>
        </div>
    </div>
</header>
<nav id="nav-accueil">
    <div class="conteneur">
        <ul>
            <li> <a href="#"> Accueil</a></li>
            <li> <a href="#"> Découvrir</a></li>
            <li> <a href="#"> Ressources TR</a></li>
            <li> <a href="#"> S'inscrire</a></li>
        </ul>
    </div>
</nav>
[%VIEW%]
<footer id="pied-de-page">
    <div class="conteneur">
        <p>SisTR (c) Groupe 3iL 2016-2017</p>
        <div class="float">
            <h6>Dev. Web</h6>
            <ul>
                <li><a href="#">PHP.net</a></li>
                <li><a href="#">W3Schools</a></li>
                <li><a href="#">Alsacréation</a></li>
                <li><a href="#">GrafikArt</a></li>
            </ul>
        </div>
        <div class="float">
            <h6>Framework / CMS</h6>
            <ul>
                <li><a href="#">Symfony</a></li>
                <li><a href="#">Zend Framework</a></li>
                <li><a href="#">Wordpress</a></li>
                <li><a href="#">Drupal</a></li>
                <li><a href="#">Joomla</a></li>
            </ul>
        </div>
        <div class="float">
            <h6>Graphisme</h6>
            <ul>
                <li><a href="#">Rocket Theme</a></li>
                <li><a href="#">Shutterstock</a></li>
                <li><a href="#">Ligature Symbols</a></li>
                <li><a href="#">Awesome Font</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</footer>
</body>
</html>
