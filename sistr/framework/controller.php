<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/11/16
 * Time: 01:32
 */

namespace F3il;
use Sistr\UtilisateurController;

defined('F3IL') or die('Access Denied');


abstract class Controller
{
    protected $defaultActionName;
    /**
     * Définit l'action par défaut
     * @param $defaultActionName
     * @throws ControllerError
     */
    public function setDefaultActionName($defaultActionName)
    {
      if(!method_exists($this,$defaultActionName.'Action')) {
        throw new ControllerError("Erreur de méthode",'UtilisateurController',$defaultActionName);
      }
      $this->defaultActionName = $defaultActionName;

    }

    /**
     * @return mixed
     */
    public function getDefaultActionName()
    {
        return $this->defaultActionName;
    }
    public function redirectAuthenticated($redirect){
        $auth = Authentication::getInstance();
        if ($auth->isLoggedIn() == true)
            HttpHelper::redirect($redirect);
    }
    public function redirectUnauthenticated($redirect){
        $auth = Authentication::getInstance();
        if ($auth->isLoggedIn() == false)
            HttpHelper::redirect($redirect);
    }
}