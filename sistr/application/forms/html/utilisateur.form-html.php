<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/12/16
 * Time: 11:18
 */
namespace Sistr;
use F3il\Field;
use F3il\Form;
use Sistr\FormHelper;

defined('SISTR') or die('Access Denied');
?>
<form id="utilisateur-form" method="POST" action="<?php echo $this->getAction();?>" class="form-horizontal">
    <?php FormHelper::input($this,'nom','text');?>
    <div class="form-group">
        <label for="prenom" class="col-sm-2 control-label"><?php $this->fLabel('prenom')?> : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="<?php $this->fName('prenom')?>" name="<?php $this->fName('prenom')?>"  placeholder="<?php $this->fLabel('prenom')?>">
            <?php $this->fMessages('prenom');?>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label"><?php $this->fLabel('email')?> : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="<?php $this->fName('email')?>" name="<?php $this->fName('email')?>"  placeholder="<?php $this->fLabel('email')?>">
            <?php $this->fMessages('email');?>
        </div>
    </div>
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label"><?php $this->fLabel('login')?> : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="<?php $this->fName('login')?>" name="<?php $this->fName('login')?>"  placeholder="<?php $this->fLabel('login')?>">
            <?php $this->fMessages('login');?>
        </div>
    </div>
    <div class="form-group">
        <label for="motdepasse" class="col-sm-2 control-label"><?php $this->fLabel('motdepasse')?> : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="<?php $this->fName('motdepasse')?>" name="<?php $this->fName('motdepasse')?>"  placeholder="<?php $this->fLabel('motdepasse')?>">
            <?php $this->fMessages('motdepasse');?>
        </div>
    </div>
    <div class="form-group">
        <label for="confirmation" class="col-sm-2 control-label"><?php $this->fLabel('confirmation')?> : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="<?php $this->fName('confirmation')?>" name="<?php $this->fName('confirmation')?>"  placeholder="<?php $this->fLabel('confirmation')?>">
            <?php $this->fMessages('confirmation');?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <input type="hidden" value="<?php echo $this->_field['id']->value?>" class="form-control" id="<?php $this->fName('id')?>" name="<?php $this->fName('id')?>"  placeholder="<?php $this->fLabel('id')?>">
            <?php $this->fMessages('id');?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Envoyer</button>
        </div>
    </div>
</form>
