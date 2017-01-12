<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:26
 */
namespace Sistr;
use F3il\Authentication;
use F3il\Controller;
use F3il\Messages;
use F3il\Page;
use F3il\HttpHelper;

defined('SISTR') or die('Acces Denied');


class IndexController extends Controller
{
    function __construct()
    {
        $this->redirectAuthenticated('?controller=utilisateur&action=lister');
        $this->setDefaultActionName('index');
    }

    function indexAction()
    {
        $page = Page::getInstance();//On appelle l'objet page
        $page->setTemplate('index');//on defini le template
        $page->setView('index');// on defini la vue
        $login = new LoginForm('?controller=index&action=index');//On crée un objet du formulaire
        $page->login= $login;// Créer une proprieté dynamique de page et lui attribuer la proprieté du formulaire
        if ($login->isSubmitted() == false){ // Verification du formulaire
            return;
        }
        $page->login->loadData(INPUT_POST);// Chargement de données
        $valid = $login->isValid();
        if ($valid == false){ // Validation des données
            Messages::addMessage('Login/ Mot de passe incorrect',2);
            return;
        }
        $data = $login->getData();// Sauvergarde des données du formulaire
        $auth = Authentication::getInstance();
        if (!$auth->login($data['login'],$data['motdepasse'])){
            Messages::addMessage('Login/ Mot de passe incorrect',2);
            return;
        }
        HttpHelper::redirect('?controller=utilisateur&action=lister');
    }
}
        