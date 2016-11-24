<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/11/16
 * Time: 15:16
 */

namespace F3il;
defined("F3IL") or die("Access Denied");


class Configuration
{
    private static $conf;
    protected $data = array();

    /**
     * Configuration constructor.
     * @param $inifile
     */
    private function __construct($inifile){
        if(!is_readable($inifile))
            die("Fichier de configuration pas lisible");
        if (!parse_ini_file($inifile))
            die("Configuration fausse");
        $this->data = parse_ini_file($inifile);
    }

    /**
     * Méthode de récupération de l'instance
     *
     * @param $inifile: chemin du fichier INI de configuration
     * @return Configuration
     */
    public static function getInstance($inifile){
        if (!isset($inifile))
            $inifile = "";
        self::$conf = new Configuration($inifile);
        return self::$conf;
    }

    /**
     * Getter pour les propriétés dynamiques de la configuration.
     *
     * @param string $name : nom de la propriété dynamique
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->data[$name];
    }

    /**
     * Méthode permetant de verifier l'insance unique de la classe configuration
     * @return mixed
     */
    public static function isLoaded(){
        return is_null(self::$conf);   
    }

}