<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/11/16
 * Time: 18:35
 */
namespace Sistr;
defined("SISTR") or die("Access Denied");
?>
<h2>Liste des Utilisateurs</h2>

    <table class="table table-bordered table-condensed table-striped table-hover">
        <thead>
            <tr>
            <?php
            $affiche=array();
            $a = 0;
            foreach ($this->utilisateurs as $user => $content){
                foreach ($content as $key =>$value){
                    if (!in_array($key,$affiche) and $key !='motdepasse')
                        $affiche[] = $key;
                }
            }
            foreach ($affiche as $value){
                ?>
                    <th>
                        <?php echo ucfirst($value);?>
                    </th>
                <?php
            }
            ?>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
                <?php
                foreach ($this->utilisateurs as $user){
                   ?>
                <tr>
                    <td>
                    <?php echo $user['id'];
                    ?>
                    </td>
                    <td>
                        <?php echo $user['nom'];
                        ?>
                    </td>
                    <td>
                        <?php echo $user['prenom'];
                        ?>
                    </td>
                    <td>
                        <?php echo $user['email'];
                        ?>
                    </td>
                    <td>
                        <?php echo $user['login'];
                        ?>
                    </td>
                    <td>
                        <?php echo $user['creation'];
                        ?>
                    </td>
                    <td>
                        <?php echo $user['connexion'];
                        ?>
                    </td>
                    <td>

                        <button name="id" value="<?php echo $user['id']?>" form="edit-form" class="btn btn-default btn-xs" title="editer"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                        <button name="id" value="<?php echo $user['id']?>" form="delete-form" class="btn btn-default btn-xs" title="supprimer"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
                <?php
                }
                ?>
        </tbody>
    </table>
    <form id="delete-form" action="/web/sistr/index.php?controller=utilisateur&action=supprimer" method="post">
                
    </form>
    <form id="edit-form" action="/web/sistr/index.php?controller=utilisateur&action=editer" method="post">
    
    </form>
