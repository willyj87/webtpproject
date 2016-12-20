<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 02:17
 */
namespace inews;
defined('3INEWS') or die('Access Denied');

abstract class CsrfHelper{
    const  SESSION_KEY = 'f3il.csrfToken';

    public static function getToken(){
        if(!isset($_SESSION[self::SESSION_KEY])){
            $_SESSION[self::SESSION_KEY] = hash('sha256',uniqid());
        }
        return $_SESSION[self::SESSION_KEY];
    }
    public static function checkToken(){
        if ($_SESSION[self::SESSION_KEY] == '')
            return false;
        if (filter_input($_POST,$_SESSION[self::SESSION_KEY]) != 0 )
            return false;
        return true;
    }
    public static function csrf(){
        $key = self::getToken();
        echo '<input type="hidden" name="'.$key.'" value="0">';
    }
}


