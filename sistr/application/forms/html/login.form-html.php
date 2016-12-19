<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/12/16
 * Time: 08:19
 */
namespace Sistr;
defined("SISTR") or die("Access Denied");
?>
<form id="login-form" method="POST" action="<?php echo $this->getAction()?>">
    <input type="text" id="<?php $this->fName('login')?>" name="<?php $this->fName('login')?>" placeholder="Votre login" value="<?php $this->fValue('login')?>">
    <input type="password" id="<?php $this->fName('motdepasse')?>" name="<?php $this->fName('motdepasse')?>" placeholder="Votre mot de passe" value="<?php $this->fValue('motdepasse')?>">
    <button type="submit"> Se connecter</button>
    <?php CsrfHelper::csrf();?>
</form>