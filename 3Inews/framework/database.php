<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/11/16
 * Time: 22:38
 */

namespace F3il;
defined('F3IL') or die('Access Denied');

abstract class Database
{
    private static $database;

    /**
     * Connection à la base de données à partir de configuration.ini
     * @return \PDO
     * @throws Error
     */
    public static function getInstance()
    {
        if(Configuration::isLoaded() == false)
            throw new Error("Configuration is not load in database class");
        $conf = Configuration::getInstance();
        $dsn = 'mysql:host='.$conf->mysql_host.';dbname='.$conf->mysql_dbname;
        self::$database = new \PDO($dsn,$conf->mysql_login,$conf->mysql_password, array(\PDO::MYSQL_ATTR_INIT_COMMAND, \PDO::ERRMODE_EXCEPTION));
        return self::$database;
    }
}