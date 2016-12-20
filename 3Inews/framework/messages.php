<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/11/16
 * Time: 23:30
 */

namespace F3il;
defined('F3IL') or die('Access Denied');

abstract class Messages
{
    const MESSAGE_SUCCESS = 0;
    const MESSAGE_WARNING = 1;
    const MESSAGE_ERROR = 2;
    private static $_messages=array();
    private static $_renderer = '\F3il\Messages::defaultRenderer';

    /**
     * ajout d'un message dans le tableau $_message
     * @param $message
     * @param $type
     * @throws Error
     */
    public static function addMessage($message,$type)
    {
        if (!($type>= 0 && $type<= 2))
            throw new Error("Message d'erreur de type inconnu");
        self::$_messages = array(array('type'=>$type,'message'=>$message));
    }

    /**
     * Compte les messages
     * @return mixed
     */
    public static function getMessagesCount()
    {
        return count(self::$_messages);
    }

    /**
     * controle l'existence d'un message et le retourne
     * @param int $num
     * @return array
     * @throws Error
     */
    public static function getMessages($num = 0)
    {
        if (!isset(self::$_messages[$num]))
            throw new Error("Message demandé incorrect");
        return self::$_messages[$num];
    }

    /**
     * Setter normal pour le renderer
     * @param $renderer
     */
    public static function setMessageRenderer($renderer)
    {
        self::$_renderer = $renderer;
    }

    /**
     * Appelle la fonction contenu dans $_renderer
     * @return mixed
     */
    public static function render()
    {
        ob_start();
        call_user_func(self::$_renderer);
        return ob_get_clean();
        
    }

    /**
     *Methode de rendu du message d'erreur
     */
    public static function defaultRenderer()
    {
        foreach (self::$_messages as $message){

            if ($message['type'] == self::MESSAGE_SUCCESS)
            {
                    echo "<div>"."Success : ".$message['message']."</div>";
            }
            if ($message['type'] == self::MESSAGE_ERROR)
            {
                echo "<div>"."Error : ".$message['message']."</div>";
            }

            if ($message['type'] == self::MESSAGE_WARNING)
            {
                    echo "<div>"."Warning : ".$message['message']."</div>";
            }
        }
    }

}