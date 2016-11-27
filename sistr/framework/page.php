<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/11/16
 * Time: 23:58
 */
namespace F3il;
defined('F3IL') or die('ACCES DENIED');
class Page{
    protected $templatefile;
    protected $viewfile;
    protected $data = array();
    protected $pageparameter;
    protected $pageTitle;
    protected $viewHTML;
    private static $page;

    /**
     * Page constructor.
     */

    private function __construct(){
        //$this->pageparameter = $pageparameter;
    }

    /**
     * Méthode de récupération de l'instance de Page
     *
     * @return Page
     */
    public static function  getInstance(){
        if(is_null(self::$page))
            self::$page = new Page();
        return self::$page;
    }

    /**
     * setteur du titre de la page
     * @param $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * getter du titre de la page
     * @return mixed
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }
    
    public function getParam(){
       // return $this->pageparameter;
    }

    /**
     * Précise le template à utiliser
     *
     * @param string $templatefile : racine du nom du template à utiliser
     * @return $this
     */
    public function setTemplate($templatefile)
    {
        if (!is_readable(APPLICATION_PATH.'/templates'.'/'.$templatefile.'.template.php')){
                echo "Fichier ".$templatefile.".template.php non trouvé </br>";
        }
        else {
            $this->templatefile = $templatefile;
        }
        return $this;
    }

    /**
     * Précise la vue à utiliser
     *
     * @param $viewfile : racine du nom de la vue à utiliser
     * @return $this
     */
    public function setView($viewfile)
    {
        if (!is_readable(APPLICATION_PATH.'/views'.'/'.$viewfile.'.view.php')){
        echo "Fichier ".$viewfile.".view.php non trouvé </br>";
        }
        else {
        $this->viewfile = $viewfile;
        }
        return $this;
    }

    /**
     * Permet d'insérer la vue dans le template
     */
    private function insertView(){
        require APPLICATION_PATH.'/views'.'/'.$this->viewfile.'.view.php';
    }
    /**
     * Effectue le rendu du template et de la vue
     *
     */
    public function render(){
        if(!isset($this->templatefile) && !isset($this->viewfile))
            die("Non affecté (template)");
        require APPLICATION_PATH.'/templates'.'/'.$this->templatefile.'.template.php';
      /**  if(!isset($viewfile))
            die("Non affecté (vue)");
        require $viewfile;

       * */
    }
    /**
     * Getter pour les propriétés dynamiques de Page
     *
     * @param string $name : nom de la propriété dynamique
     * @return mixed
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (!isset($this->data[$name]))
            die("Donnée absente du tableau");
        return $this->data[$name];
    }
    /**
     * Setter pour les propriétés dynamiques de Page
     *
     * @param string $name : nom de la propriété dynamique
     * @param mixed $value : valeur de la propriété dynamique
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->data[$name] = $value;
    }

    /**
     * Méthode permettant d'appeler la fonction isset() sur les prorpriétés dynamiques
     *
     * @param string $name : nom de la propriété dynamique
     * @return bool
     */
    public function __isset($name)
    {
        // TODO: Implement __isset() method
        return  isset($this->data[$name]);
    }

}

