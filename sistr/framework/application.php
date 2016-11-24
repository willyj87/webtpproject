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
    private static $app;

    /**
     * Application constructor.
     * @param $inifile
     */
    private function __construct($inifile){
        $configuration = Configuration::getInstance($inifile);
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
    public function getParam(){
       // return $this->application;
    }

    /**
     * Méthode principale d'exécution de l'application Web
     * - Analyse l'URL de la requête
     * - Route la requête vers l'action de contrôleur demandéé
     * - Affiche la page.
     */
    public function run(){
        $this->controllerName = filter_input(INPUT_GET,'controller');
        require_once APPLICATION_PATH.'/controllers'.'/'.$this->controllerName.'.controller.php';
        $controllerClass = APPLICATION_NAMESPACE.'\\'.ucfirst($this->controllerName).'Controller';
        $controller = new $controllerClass;
        $this->actionName = filter_input(INPUT_GET, 'action');
        $actionMethod = $this->actionName.'Action';
        $controller->$actionMethod();
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
}
