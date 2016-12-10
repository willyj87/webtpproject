<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/16
 * Time: 11:06
 */

namespace Sistr;
use F3il\Error;
use F3il\Field;
use F3il\Form;

defined('SISTR') or die('Access Denied');


class UtilisateurForm extends Form
{
    function __construct($action)
    {
        parent::__construct($action, 'utilisateur-form');

        /** @var TYPE_NAME $email */
        Form::addFormField($email = new Field('email','Email',null,true));
        Form::addFormField($login = new Field('login','Login',null,true));
        Form::addFormField($nom = new Field('nom', 'Nom', null, true));
        Form::addFormField($prenom = new Field('prenom', 'Prenom', null, true));
        Form::addFormField($motdepasse = new Field('motdepasse', 'Mot de passe', null, true));
        Form::addFormField($id = new Field('id', 'Id', null, true));
        Form::addFormField($confirmation = new Field('confirmation', 'Confirmation', null, true));
    }
    /**
     * @param $message
     */
    function messageRenderer($message){
        ?>
        <p class="text-danger text-right"><?php echo $message;?></p>
        <?php
    }
    /**
     * @param Field $field
     * @return TYPE_NAME|string
     */
    function missingFieldMessageRenderer(Field $field){
        $message = "Veuillez remplir le champ suivant ".strtolower($field->label);
        /** @var TYPE_NAME $message */
        return $message;
    }


    /**
     * @param $value
     * @return mixed
     */
    function nomFilter($value){
            return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function prenomFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     */
    function emailFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     */
    function loginFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     */
    function motdepasseFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     */
    function confirmationFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }
    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function loginValidator($value){
        if (strlen($value) < 6)
            $this->addMessage('login','login trop cours');
        else
            return $value;
    }

    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function motdepasseValidator($value){
        if (strlen($value) < 4)
            $this->addMessage('motdepasse','Mot de passe trop court');
        else
            return $value;
    }

    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function emailValidator($value){
        if (!filter_var($value,FILTER_VALIDATE_EMAIL))
            $this->addMessage('email','Entrez une adresse mail valide');
        else
            return $value;
    }

    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function confirmationValidator($value){
        if ($this->_field['confirmation']->value != $this->_field['motdepasse']->value)
            $this->addMessage('confirmation','Non identique au mot de passe');
        else
            return $value;
    }


}