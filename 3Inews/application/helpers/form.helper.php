<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/12/16
 * Time: 14:04
 */

namespace inews;
use F3il\Form;
defined('3INEWS') or die("Access Denied");
abstract class FormHelper
{
    public static function input(Form $form,$fieldName,$type){
        ?>
            <div class="form-group">
                <label for="<?php $form->fName($fieldName); ?>"  class="col-sm-2 control-label"><?php $form->flabel($fieldName);?> : </label>
                <div class="col-sm-10">
                    <input type='<?php echo $type;?>'  class="form-control" id="<?php $form->fName($fieldName); ?>"  name="<?php $form->fName($fieldName)?>"  placeholder="<?php $form->fLabel($fieldName);?>" >
                    <?php $form->fMessages($fieldName);?>
                </div>
            </div>
        <?php
    }
}