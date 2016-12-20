<?php
namespace F3il;
defined('F3IL') or die('Acces interdit');

class Authentication {
    private static $_instance;
    protected $loginKey;
    protected $passwordKey;
    protected $idKey;
    
    /**
     * Modèle servant de délégué pour l'authentification
     * @var AuthenticationModel 
     */
    protected $authenticationModel = null;
    protected $user;
    
    const SESSION_KEY = 'f3il.authentication';
    
    /**
     * Constructeur privé 
     * 
     * @param \F3il\AuthenticationInterface $model
     */
    private function __construct(AuthenticationInterface $model) {
        $this->authenticationModel = $model;
        $this->loginKey = $this->authenticationModel->auth_getLoginKey();
        $this->passwordKey = $this->authenticationModel->auth_getPasswordKey();
        $this->idKey = $this->authenticationModel->auth_getUserIdKey();
        if ($this->isLoggedIn() == true)
            $this->user = $this->authenticationModel->auth_getUserById($_SESSION[self::SESSION_KEY]);
        unset($this->user[$this->passwordKey]);
    }
    
    
    /**
     * Récupérateur d'instance 
     * 
     * @param \F3il\AuthenticationInterface $model
     * @return Authentication
     * @throws Error
     */
    public static function getInstance(AuthenticationInterface $model=null) {
        if(is_null(self::$_instance)){
            if($model == null ){
                throw new Error('Model non défini');
            }
            self::$_instance = new Authentication($model);
        }
        return self::$_instance;
    }
    
    
    /**
     * Vérifie si des données comportent les clés nécessaires à l'authentification
     * @param array $data
     * @return boolean
     */
    public function checkAuthenticationKeys(array $data) {

        if (!is_array($data))
            return false;
        if (!array_key_exists($this->idKey,$data))
            return false;
        if (!array_key_exists($this->loginKey,$data))
            return false;
        if (!array_key_exists($this->passwordKey,$data))
            return false;
        return true;
    }
    
    
    /**
     * Méthode appelée quand un utilisateur tente de se connecter
     * 
     * @param string $login
     * @param string $password
     * @return boolean
     * @throws Error
     */
    public function login($login,$password) {
        $this->user = $this->authenticationModel->auth_getUserByLogin($login);
        $sel = $this->authenticationModel->auth_getSalt($this->user);
        if (!$this->user){
            return false;
        }
        if (!$this->checkAuthenticationKeys($this->user)){
            throw new Error('Modèle Autentification');
        }
        if ($this->user[$this->passwordKey]!= $this->hash($password,$sel['creation'])){

            return false;
        }
        $_SESSION[self::SESSION_KEY] = $this->user[$this->idKey];
        return true;
    }

    /**
     * Encodage Mot de passse
     * @param $password: mot de passe
     * @param $salt: sel
     * @return string : mot de passe finale
     */
    public function hash($password, $salt){
        return hash('sha256',hash('sha256',$salt).$password);
    }

    /**
     * Methode de déconnection
     */
    public function logout(){
        $this->user = null;
        unset($_SESSION[self::SESSION_KEY]);
        
    }

    /**
     * Methode de verification de connexion
     * @return bool
     */
    public function isLoggedIn(){
        if (isset($_SESSION[self::SESSION_KEY]))
            return true;
        else
            return false;
    }
    public function getLoggedUser(){
        if ($this->isLoggedIn() == false)
            throw new Error ('Aucun utilisateur connecté');
        return $this->user;
    }
    public function getLoggedUserId(){
        if ($this->isLoggedIn() == false)
            throw new Error ('Aucun utilisateur connecté');
        return $_SESSION[self::SESSION_KEY];
    }
}