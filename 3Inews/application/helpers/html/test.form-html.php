<?php
namespace Sistr;
use F3il\Field;
use F3il\Form;

defined('SISTR') or die('Acces interdit');
?>
<form id="test-form" method="POST" action="<?php echo $this->getAction();?>" class="form-horizontal">
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label"><?php $this->flabel('email');?> : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="<?php $this->fName('email'); ?>"  name="<?php $this->fName('email')?>"  placeholder="<?php $this->fLabel('email')?>" >
            <?php $this->fMessages('email');?>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label"><?php $this->fLabel('age')?> : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="<?php $this->fName('age')?>" name="<?php $this->fName('age')?>"  placeholder="<?php $this->fLabel('age')?>">
            <?php $this->fMessages('age');?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Envoyer</button>
        </div>
    </div>
</form>
