<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/11/16
 * Time: 01:28
 */

namespace inews;
defined('3INEWS') or die("Access Denied");

use F3il\Authentication;
use F3il\AuthenticationInterface;
use F3il\Database;

class UtilisateurModel implements AuthenticationInterface
{
    public function lister() {
        $db = Database::getInstance();

        $sql = "SELECT * FROM utilisateurs ORDER BY nom, prenom";
        try {
            $req  = $db->prepare($sql);
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function supprimer($id){
        $db = Database::getInstance();

        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        
        try{
            $req = $db->prepare($sql);
            $req->bindParam(':id',$id,\PDO::PARAM_INT);
            print_r($req);
            $req->execute();
        } catch (\PDOException $ex) {
            die('Erreur SQL '.$ex->getMessage());
        }
        echo "suppression effectué".'<br>';
    }

    /**
     * @param $data
     */
    public function creer($data){
        $sqlTime = date('Y-m-d H:i:s');
        $db = Database::getInstance();
        $auth = Authentication::getInstance();
        $mdp = $auth->hash($data['motdepasse'],$sqlTime);
        $sql = "INSERT INTO utilisateurs SET nom=:nom, prenom=:prenom, login=:login, email=:email, motdepasse=:mdp, creation=:creation ";
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':nom', $data['nom']);
            $req->bindValue(':prenom', $data['prenom']);
            $req->bindValue(':login', $data['login']);
            $req->bindValue(':email', $data['email']);
            $req->bindValue(':mdp', $mdp);
            $req->bindValue(':creation', $sqlTime);
            $req->execute();
        } catch (PDOException $ex) {
            die('Erreur SQL '.$ex->getMessage());
        }
    }

    /**
     * @param $login
     * @throws \F3il\Error
     */
    public function loginExistant($login, $id){
        $db = Database::getInstance();
        if($id != 0 ){
            $sql = "SELECT COUNT('login') FROM utilisateurs WHERE login=:login AND id!=:id";
            try {
                $req = $db->prepare($sql);
                $req->bindValue(':login', $login);
                $req->bindValue(':id', $id);
                $req->execute();
            }catch (PDOException $ex) {
                die('Erreur SQL '.$ex->getMessage());
            }
        }else{
            $sql = "SELECT COUNT('login') FROM utilisateurs WHERE login=:login";
            try {
                $req = $db->prepare($sql);
                $req->bindValue(':login', $login);
                $req->execute();
            }catch (PDOException $ex) {
                die('Erreur SQL '.$ex->getMessage());
            }
        }
        $resultat = $req->fetch(\PDO::FETCH_ASSOC);
           if ($resultat["COUNT('login')"] == 0){
               return false;
           }
           else
               return true;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \F3il\Error
     */
    public function lire($id){
        $db = Database::getInstance();

        $sql = "SELECT * FROM utilisateurs WHERE id=:id";
        try{
            $req = $db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
        }catch (\PDOException $ex){
            die('Erreur SQL '.$ex->getMessage());
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }
    public function mettreAJour($data){
        $db = Database::getInstance();
        $auth = Authentication::getInstance();
        $lecture = $this->lire($data['id']);
        $time = $lecture['creation'];
        $mdp = $auth->hash($data['motdepasse'],$time);
        if ($data['motdepasse'] == ''){
            $sql = "UPDATE utilisateurs SET nom=:nom,prenom=:prenom,login=:login,email=:email WHERE id=:id";
            try{
                $req = $db->prepare($sql);
                $req->bindValue(':id',$data['id']);
                $req->bindValue(':nom',$data['nom']);
                $req->bindValue(':prenom',$data['prenom']);
                $req->bindValue(':login',$data['login']);
                $req->bindValue(':email',$data['email']);
                $req->execute();
            }catch (\PDOException $ex) {
                die('Erreur SQL ' . $ex->getMessage());
            }
        }
        else {

            $sql = "UPDATE utilisateurs SET nom=:nom,prenom=:prenom,login=:login,email=:email,motdepasse=:motdepasse WHERE id=:id";
            try {
                $req = $db->prepare($sql);
                $req->bindValue(':id', $data['id']);
                $req->bindValue(':nom', $data['nom']);
                $req->bindValue(':prenom', $data['prenom']);
                $req->bindValue(':login', $data['login']);
                $req->bindValue(':email', $data['email']);
                $req->bindValue(':motdepasse', $mdp);
                $req->execute();
            } catch (\PDOException $ex) {
                die('Erreur SQL ' . $ex->getMessage());
            }
        }
        
    }
    public function auth_getLoginKey()
    {
        // TODO: Implement auth_getLoginKey() method.
        return 'login';
    }
    public function auth_getPasswordKey()
    {
        // TODO: Implement auth_getPasswordKey() method.
        return 'motdepasse';
    }
    public function auth_getUserById($id)
    {
        // TODO: Implement auth_getUserById() method.
        return $this->lire($id);
    }
    public function auth_getUserByLogin($login)
    {
        // TODO: Implement auth_getUserByLogin() method.
        $db = Database::getInstance();

        $sql = "SELECT * FROM utilisateurs WHERE login=:login";
        try{
            $req = $db->prepare($sql);
            $req->bindValue(':login',$login);
            $req->execute();
        }catch (\PDOException $ex){
            die('Erreur SQL '.$ex->getMessage());
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }
    public function auth_getUserIdKey()
    {
        // TODO: Implement auth_getUserIdKey() method.
        return 'id';
    }
    public function auth_getSalt($user)
    {
        // TODO: Implement auth_getSalt() method.
        $db = Database::getInstance();

        $sql = "SELECT creation FROM utilisateurs WHERE id=:id";
        try{
            $req = $db->prepare($sql);
            $req->bindValue(':id',$user['id']);
            $req->execute();
        }catch (\PDOException $ex){
            die('Erreur SQL '.$ex->getMessage());
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

}