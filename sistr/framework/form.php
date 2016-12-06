<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30/11/16
 * Time: 14:27
 */

namespace F3il;
use Sistr\TestForm;

defined('F3IL') or die("Access Denied");

abstract class Form
{
    protected $_html;
    protected $_field = array();
    protected $_action;
    protected $_missingFile = array();

    /**
     * Form constructor.
     * @param $action
     */
    public function __construct($action)
    {   
        $this->_action = $action;
        $this->getHtmlFile();
    }

    /**
     *
     */
    public function render(){
        require $this->_html;
    }

    public function getAction()
    {
        return $this->_action;
    }

    /**
     * @return string
     * @throws Error
     */
    public function getHtmlFile()
    {   $nomClasse = get_class($this);
        $position = strrpos($nomClasse,'\\');
        $racine = substr($nomClasse,$position+1);
        $final = strrpos($racine,'F');
        $method = substr($racine,0,$final);
        $finalM = strtolower($method);
        $this->_html = APPLICATION_PATH.'/forms/html/'.$finalM.'.form-html.php';
        if(!is_readable($this->_html))
            throw new Error("Fichier formulaire non lisible");
        return $this->_html;
    }

    /**
     * @param Field $field
     * @throws Error
     */
    function addFormField(Field $field){
        if(array_key_exists($field->name, $this->_field))
            throw new Error('Champ de formulaire déjà existant');
        $this->_field[$field->name]= $field;
    }

    /**
     * @param $fieldName
     * @throws Error
     */
    function fLabel($fieldName){
        if (!in_array($fieldName,$this->_field)){
            throw new Error('Champ de formulaire absent');
        }
        echo $fieldName->label;
    }

    /**
     * @param $fieldName
     * @throws Error
     */
    function fName($fieldName){
        if (!in_array($fieldName,$this->_field)){
            throw new Error('Champ de formulaire absent');
        }
        echo $fieldName->name;
    }

    /**
     * @param $fieldName
     * @throws Error
     */
    function fValue($fieldName){
        if (!in_array($fieldName,$this->_field)){
            throw new Error('Champ de formulaire absent');
        }
         if($fieldName->value == null)
             echo $fieldName->defaultValue;
        echo $fieldName->value;
    }

    /**
     * @param $source
     */
    private function loadFromArray($source){
        foreach ($this->_field as $data){
            if(array_key_exists($data->name,$source)){
                if(trim($data->value) != '') {
                    $data->value = filter_var($source['value']);
                }
                else
                    if($data->required == true and $data->value == '')
                    $this->_missingFile[$data->name] = $data->name;
            }
            $data->name = $this->applyFilter($data->name,$data->value);
        }


    }

    /**
     * @param $source
     */
    private function loadFromInput($source){
        foreach ($this->_field as $data){
            $data->value = filter_input($source,$data->name);
            if ((trim($data->value) == '' and $data->required == true))
                $this->_missingFile[$data->name] = $data->name;
            $data->value = $this->applyFilter($data->name,$data->value);
        }
    }

    /**
     * @param $source
     * @throws Error
     */
    function loadData($source){
        $this->_missingFile = array();
        if(is_integer($source))
            $this->loadFromInput($source);
        elseif (is_array($source))
            $this->loadFromArray($source);
        else
            throw new Error('Source de type incorrect');

    }

    /**
     * @param $fieldName
     * @param $rawValue
     * @return mixed
     */
    protected function applyFilter ($fieldName, $rawValue)
    {
       $methodName = str_replace('-','',lcfirst((ucwords($fieldName,'-')))).'Filter';
        if(method_exists($this,$methodName)){
           return $this->$methodName($rawValue);
        }
        return $rawValue;
    }

    /**
     * @return bool
     */
    function isValid(){
        $valid = true;
        foreach ($this->_field as $data){
            if(in_array($data->name, $this->_missingFile)){
                $valid = false;
                $data->message[] = $this->missingFieldMessageRenderer($data);
            }
            if (trim($data->name) != '' ||  $data->required == true){
                $validator = str_replace('-','',lcfirst((ucwords($data->name,'-')))).'Validator';
                if (method_exists($this,$validator))
                    $valid = $this->$validator($data->value) && $valid;
            }
        }
        return $valid;
    }

    /**
     * @param $fieldName
     * @param $message
     * @throws Error
     */
    function addMessage($fieldName,$message){
        if (!array_key_exists($fieldName,$this->_field))
            throw new Error('fieldname non défini');
        $this->_field[$fieldName]->message[] = $message;
    }

    /**
     * @param $fieldName
     * @return mixed
     * @throws Error
     */
    function getValidationMessage($fieldName){
        if (!array_key_exists($fieldName, $this->_field)){
            throw new Error ('Fieldname nom défini erreur de getValidaion');
        }
        return $this->_field[$fieldName]->message;
    }

    /**
     * @param $message
     */
    function messageRenderer($message){
        echo '<p>'.$message.'</p>';
    }

    /**
     * @param $fieldName
     * @throws Error
     */
    function fMessages($fieldName){
        if (!array_key_exists($fieldName, $this->_field)){
            throw new Error ('Fieldname nom défini erreur de fmessage');
        }
        foreach ($this->_field[$fieldName]->message as $message){
            $this->messageRenderer($message);
        }
    }

    /**
     * @param Field $field
     * @return string
     */
    function missingFieldMessageRenderer(Field $field){
        if(in_array($field->name,$this->_missingFile))
            return 'Le champ '.strtolower($field->label).' est manquant';
    }

}