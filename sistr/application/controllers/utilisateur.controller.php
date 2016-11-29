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
use F3il\Error;
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
        $page->setView("utilisateur-liste");
        $model = new UtilisateurModel();
        $page->utilisateurs = $model->lister();
    }
    public function editerAction(){
        echo __METHOD__;
        print_r($_POST);
        die('ok');
    }
    public function supprimerAction(){
        if(!filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) or filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) == null)
            throw new Error("Erreur de formulaire");
        $modelsupprimer = new UtilisateurModel();
        $id = $_POST['id'];
        $modelsupprimer->supprimer($id);
        die("Supprimé");
    }
    
    
}