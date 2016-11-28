<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/11/16
 * Time: 22:43
 */
namespace Sistr;
defined("SISTR") or die("Access Denied");
use F3il\Application;
use F3il\Configuration;
use F3il\Controller;
use F3il\Messages;
use F3il\Page;

class UtilisateurController extends Controller{
    public function __construct()
    {
        $this->setDefaultActionName('lister');
    }

    public function listerAction(){
        $page = Page::getInstance();
        $page->setTemplate("template-bt");
        $page->setView("vue1");
        Messages::addMessage('bonjour', 1);
        $page->titre = "liste utilisateurs";
        $model = new UtilisateurModel();
        $page->utilisateurs = $model->lister();
    }
    
}