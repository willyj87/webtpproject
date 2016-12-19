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
<div class="col-sm-10">
<div class="form-group">

    <form id="utilisateur-form" method="POST" action="<?php echo $this->getAction();?>" class="form-horizontal">
    <?php FormHelper::input($this,'nom','text');?>
    <?php FormHelper::input($this,'prenom','text');?>
    <?php FormHelper::input($this,'login','text');?>
    <?php FormHelper::input($this,'email','text');?>
    <?php FormHelper::input($this,'motdepasse','text');?>
    <?php FormHelper::input($this,'confirmation','text');?>
        <?php CsrfHelper::csrf();?>
            <input type="hidden" value="<?php $this->fValue('id');?>" class="form-control" id="<?php $this->fName('id')?>" name="<?php $this->fName('id')?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Envoyer</button>
        </div>
    </div>
</form>
