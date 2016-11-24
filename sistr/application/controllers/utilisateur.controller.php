<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/11/16
 * Time: 22:43
 */
namespace Sistr;
use F3il\Application;
use F3il\Configuration;
use F3il\Page;

class UtilisateurController{
    public function listerAction(){
        $page = Application::getPage();
        $page->setTemplate("template-a");
        $page->setView("vue1");
        $page->titre = "liste utilisateurs";
        $page->name = "Willy";
    }
    
}