<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/11/16
 * Time: 01:29
 */

namespace Sistr;


use F3il\Controller;
use F3il\Page;

class SuiviController extends Controller
{
    function __construct()
    {
        $this->redirectUnauthenticated('?controller=index&action=index');
        $this->setDefaultActionName('lister');
    }

    function listerAction(){
        $page= Page::getInstance();
        $page->setTemplate('application');
        $page->setView('vue2');
    }
}