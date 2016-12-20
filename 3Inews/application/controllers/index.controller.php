<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:26
 */
namespace inews;
use F3il\Authentication;
use F3il\Controller;
use F3il\Messages;
use F3il\Page;
use F3il\HttpHelper;


defined('3INEWS') or die('Acces Denied');


class IndexController extends Controller
{
    function __construct()
    {
        $this->setDefaultActionName('index');
    }

    function indexAction()
    {
        $page = Page::getInstance();
        $page->setTemplate('index');
        $page->setView('index');
        $login = new LoginForm('?controller=index&action=index');
        $page->login= $login;
        if ($login->isSubmitted() == false){
            return;
        }
        $page->login->loadData(INPUT_POST);
        $valid = $login->isValid();
        if ($valid == false){
            Messages::addMessage('Login/ Mot de passe incorrect valid',2);
            return;
        }
        $data = $login->getData();
        $auth = Authentication::getInstance();
        if (!$auth->login($data['login'],$data['motdepasse'])){
            Messages::addMessage('Login/ Mot de passe incorrect',2);
            return;
        }

    }
}
        