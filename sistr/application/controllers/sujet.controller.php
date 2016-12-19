<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:39
 */
namespace Sistr;
use F3il\Controller;
use F3il\Page;

defined('SISTR') or die('Acces Denied');


class SujetController extends Controller{
    function __construct()
    {
        $this->redirectUnauthenticated('?controller=index&action=index');
        $this->setDefaultActionName('lister');
    }

    function listerAction(){
        $page = Page::getInstance();
        $page->setTemplate('application');
        $page->setView('sujet-liste');
    }
}