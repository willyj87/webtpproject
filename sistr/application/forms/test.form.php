<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/12/16
 * Time: 10:54
 */

namespace Sistr;
defined('SISTR') or die('Access Denied');



use F3il\Form;
use F3il\Field;

class TestForm extends Form
{

    /**
     * TestForm constructor.
     * @param $action
     */
    public function __construct($action)
    {
        parent::__construct($this->_action = $action,'test-form');
        Form::addFormField($email = new Field('email', 'Email', null, true));
        Form::addFormField($age = new Field('age', 'Age'));
    }

    /**
     * @param $value
     * @return mixed
     */
    public function ageFilter($value){
        //die('lala');
        return filter_var($value, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return bool
     * @throws \F3il\Error
     */
    public function ageValidator($value){
        $valid = true;
        if (filter_var($value,FILTER_SANITIZE_NUMBER_INT) && $value>= 18 && $value<= 35){
            return $value;
        }

        switch ($value){
            case filter_var($value,FILTER_SANITIZE_NUMBER_INT) == false:
                $valid = false;
                $this->addMessage('age',"l'age doit être un nombre entier");
                break;
            case $value<18 || $value>35:
                $valid = false;
                $this->addMessage('age',"l'age doit être compris entre 18 et 35 ans");
                break;
        }
        return $valid;
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

}