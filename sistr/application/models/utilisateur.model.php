<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/11/16
 * Time: 01:28
 */

namespace Sistr;
defined('SISTR') or die("Access Denied");

use F3il\Database;

class UtilisateurModel
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

        $sql = "INSERT INTO utilisateurs SET nom=:nom, prenom=:prenom, login=:login, email=:email, motdepasse=:mdp, creation=:creation ";
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':nom', $data['nom']);
            $req->bindValue(':prenom', $data['prenom']);
            $req->bindValue(':login', $data['login']);
            $req->bindValue(':email', $data['email']);
            $req->bindValue(':mdp', $data['motdepasse']);
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
                $req->bindValue(':motdepasse', $data['motdepasse']);
                $req->execute();
            } catch (\PDOException $ex) {
                die('Erreur SQL ' . $ex->getMessage());
            }
        }
        
    }
    
}