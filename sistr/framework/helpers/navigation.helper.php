<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 10:09
 */
namespace F3il;
defined('F3IL') or die('Access Denied');
abstract class NavigationHelper{

    private static $menu = array(array('title'=>'Sujets','controller'=>'sujet','action'=>'lister'),array('title'=>'Suivis','controller'=>'suivi','action'=>'lister'),
    array('title'=>'Utilisateurs','controller'=>'utilisateur','action'=>'lister'));
    /**
     *
     */
    public static function render(){
        $app = Application::getInstance();
        $param = $app->getCurrentLocation();
        echo '<ul class="nav navbar-nav">';
        foreach(self::$menu as $item){
            self::itemRenderer($item,$param);
        }
        echo '</ul>';
    }

    /**
     * @param $item
     */
    private static function itemRenderer($item,$location){
        if ($location['controller'] == $item['controller'])
            echo '<li class="active"><a href='.'"?controller='.$item['controller'].'&action='.$item['action'].'">'.$item['title'].'</a></li>';
        else
            echo '<li><a href='.'"?controller='.$item['controller'].'&action='.$item['action'].'">'.$item['title'].'</a></li>';
    }
}