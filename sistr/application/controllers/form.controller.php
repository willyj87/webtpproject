<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/12/16
 * Time: 10:57
 */

namespace Sistr;
use F3il\Application;
use F3il\Controller;
use F3il\Form;
use F3il\Page;

defined('SISTR') or die('Access Denied');


class FormController extends Controller
{
    /**
     * @throws \F3il\Error
     */
    function formAction(){
        $page = Page::getInstance();
        $page->setTemplate('template-bt');
        $page->setView('form');
        $test = new TestForm('?controller=form&action=form');
        $page->testform = $test;
        if ($test->isSubmitted()==false){
            return;
        }
        $page->testform->loadData(INPUT_POST);
        $valid = $test->isValid();
        if ($valid == false){
            $page->val = "Formulaire non valide";
            return;
        }
        $page->dataForm = $test->getData();
    }
}