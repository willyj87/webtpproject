<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/12/16
 * Time: 23:56
 */
namespace inews;
defined("3INEWS") or die("Access Denied");

use F3il\Form;
use F3il\Field;

class LoginForm extends Form {
    
    function __construct($action)
    {
        parent::__construct($this->_action=$action,'login-form');
        Form::addFormField($login = new Field('login','Login',null,true));
        Form::addFormField($motdepasse = new Field('motdepasse', 'Mot de passe', null, true));
    }
}