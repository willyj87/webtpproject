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
}