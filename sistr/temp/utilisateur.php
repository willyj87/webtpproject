<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/10/16
 * Time: 09:45
 */
defined('SECURITE') or die('ACCES INTERDIT');
class Utilisateurs{
    protected $nom;
    protected $prenom;

    public function __construct($nom,$prenom){
        $this->nom=$nom;
        $this->prenom=$prenom;
    }

    public function direBonjour()
    {
        echo "Bonjour ".$this->nom." ".$this->prenom;
    }
}