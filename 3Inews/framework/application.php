<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/11/16
 * Time: 23:10
 */
namespace F3il;
defined('F3IL') or die('Access Denied');
class Application{
    protected $controllerName;
    protected $actionName;
    protected $conf;
    protected $defaultControllerName;
    private static $app;

    /**
     * Application constructor.
     * @param $inifile
     */
    private function __construct($inifile){
       $this->conf = Configuration::getInstance($inifile);
    }

    /**
     * Retourne l'instance application
     *
     * @param string $inifile
     * @return Application
     */
    public static function  getInstance($inifile = ""){
        if(is_null(self::$app))
            self::$app = new Application($inifile);
        return self::$app;
    }

    /**
     * Vérifie et renseigne le controleur par défaut
     * @param $defaultControllerName
     * @throws Error
     */
    public function setDefaultControllerName($defaultControllerName)
    {
        $this->defaultControllerName = $defaultControllerName;
        if (!is_readable(APPLICATION_PATH.'/controllers'.'/'.$this->defaultControllerName.'.controller.php'))
            throw new Error("Le fichier controleur par défaut n'existe pas");

    }

    /**
     * Méthode principale d'exécution de l'application Web
     * - Analyse l'URL de la requête
     * - Route la requête vers l'action de contrôleur demandéé
     * - Affiche la page.
     */
    public function run(){
        if (filter_has_var(INPUT_GET,'controller')){
            $this->controllerName = filter_input(INPUT_GET,'controller');
        }
        else{
            $this->controllerName = $this->defaultControllerName;
        }
        if ($this->defaultControllerName = null){
            throw  new Error("Le controleur par défaut n'est pas indiqué");
        }
        $controllerClass = APPLICATION_NAMESPACE.'\\'.ucfirst($this->controllerName).'Controller';
        $controller = new $controllerClass;
        if(!filter_has_var(INPUT_GET,$this->actionName)){
            $this->actionName = filter_input(INPUT_GET, 'action');
            $actionMethod = $this->actionName.'Action';
            if($actionMethod == 'Action')
                $actionMethod = $controller->getDefaultActionName().'Action';
            if (!method_exists($controller,$actionMethod)) {
                throw new ControllerError("Action non existante",$controllerClass,$actionMethod);
            }
            $controller->$actionMethod();
        }
        else{
            if (($controller->getDefaultActionName()) == null){
                throw new ControllerError("Pas de Classe Controleur par défaut",$controllerClass,$this->actionName);
            }

        }
        $page = Page::getInstance();
        $page->render();
    }

    /**
     * Getter pour récupérer l'instance de la Page
     * Equivalent à Page::getInstance()
     * @return Page
     */
    public static function getPage(){
        return Page::getInstance();
    }

    /**
     * Getter pour récupérer l'instance de la Configuration
     * Equivalent à Configuration::getInstance()
     * @return Configuration
     */
    public static function getConfiguration(){
        return Configuration::getInstance();
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     *
     */
    function getCurrentLocation(){
     return array('controller'=>$this->getControllerName(), 'action'=>$this->getActionName());
    }
    function setAuthenticationDelgate($className)
    {
        $class = APPLICATION_NAMESPACE . '\\' . $className;
        $objet = new $class;
        Authentication::getInstance($objet);
    }

}
