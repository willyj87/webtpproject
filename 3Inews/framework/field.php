<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/12/16
 * Time: 14:05
 */

namespace F3il;
defined('F3IL') or die('Access Denied');

class Field
{
    public $name;
    public $label;
    public $required;
    public $value;
    public $defaultValue;
    public $message = array();

    /**
     * Field constructor.
     * @param $name
     * @param $label
     * @param null $defaultValue
     * @param bool $required
     */
    function __construct($name, $label, $defaultValue = null, $required = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->defaultValue = $defaultValue;
        $this->required = $required;
        
    }

    /**
     * @param $message
     */
    function addMessage($message){
        $this->message[] = $message;
    }

    /**
     * @return array
     */
    public function getMessage()
    {
        return $this->message;
    }

    

}