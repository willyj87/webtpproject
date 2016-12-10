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
    protected $templateHTML;
    protected $cssFile = array();
    protected $baliseCSS;
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
     * Effectue le rendu du template et de la vue
     *
     */
    public function render(){

        if(!isset($this->templatefile) && !isset($this->viewfile)){
            throw new Error("Non affecté (template)");
        }
        ob_start();
        require APPLICATION_PATH.'/views'.'/'.$this->viewfile.'.view.php';
        $this->viewHTML = ob_get_clean();

        ob_start();
        require APPLICATION_PATH.'/templates'.'/'.$this->templatefile.'.template.php';
        $this->templateHTML = ob_get_clean();

       $this->viewHTML = preg_replace_callback('/\[%\w+\%]/is', array($this,'renderCallback'),$this->viewHTML);
        echo preg_replace_callback('/\[%\w+\%]/is', array($this,'renderCallback'),$this->templateHTML);
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

    /**
     * Ajoute un fichier css à notre vue
     * @param $cssFile
     * @throws Error
     */
    public function addStyleSheets($cssFile){
        if (!is_readable($cssFile))
            throw new Error("Le fichier css indiquer n'existe pas");
        if (!in_array($cssFile,$this->cssFile))
            $this->cssFile[] = $cssFile;
        else
            return;
    }
    /**
     * Méthode d'insertion des balises link pour les vues
     */
    public function insertStyleSheets(){
        foreach ($this->cssFile as $value){
            ob_start();
            echo "<link rel='stylesheet' href = '".$value."'/>";
            $this->baliseCSS = ob_get_clean();
        }
        return $this->baliseCSS;
    }

    /**
     * Methode qui permet de récupérer le code html du Titre
     * @return mixed
     */
    public function insertPageTitle(){
        ob_start();
        echo $this->getPageTitle();
        $titre = ob_get_clean();
        return $titre;
        
    }
    /**
     * Permet d'insérer la vue dans le template
     */
    private function insertView(){
        return $this->viewHTML;
    }

    /**
     * Methode permettant de faire des callback
     * @param $matches
     * @return string
     */
    public function renderCallback($matches){
        $message = Messages::render();
        switch ($matches[0]){
            case '[%VIEW%]':
                return $this->insertView();
            case '[%STYLESHEETS%]':
                return $this->insertStyleSheets();
            case '[%TITLE%]':
                return $this->insertPageTitle();
            case '[%MESSAGES%]':
                return $message;
            default:
                return 'Default';
        }
    }



}

