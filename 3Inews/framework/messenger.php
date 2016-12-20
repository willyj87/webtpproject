<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30/11/16
 * Time: 14:03
 */

namespace F3il;
defined("F3IL") or die("Access Denied");


class Messenger
{
    const SESSION_KEY = 'f3il.messenger';

    /**
     * @param $message
     */
    public static function setMessage($message){
        $_SESSION[self::SESSION_KEY] = $message;
    }

    /**
     * @return bool
     */
    public static function getMessage(){
        if(!isset($_SESSION[self::SESSION_KEY]))
            return false;
        $content = $_SESSION[self::SESSION_KEY];
        unset($_SESSION[self::SESSION_KEY]);
        return $content;

    }

}