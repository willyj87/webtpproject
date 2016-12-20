<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/12/16
 * Time: 08:19
 */
namespace inews;
defined("3INEWS") or die("Access Denied");
?>

                    <form id="login-form" method="POST" action="<?php echo $this->getAction();?>" class="form-horizontal butonLabel">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="login-form" class="control-label"><?php $this->flabel('login');?></label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="<?php $this->fName('login'); ?>" name="<?php $this->fName('login'); ?>" placeholder="<?php $this->fLabel('login')?>" value="<?php $this->fValue('login');?>">
                                <?php $this->fMessages('login');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="login-form" class="control-label" ><?php $this->flabel('motdepasse');?></label>
                            </div>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="<?php $this->fName('motdepasse');?>" name="<?php $this->fName('motdepasse');?>" placeholder="<?php $this->flabel('motdepasse');?>" value="<?php $this->fValue('motdepasse');?>">
                                <?php $this->fMessages('motdepasse');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-6 col-sm-10">
                                <button type="submit" class="btn btn-default" id="btconnexion">Se connecter</button>
                            </div>
                        </div>
                        <?php CsrfHelper::csrf();?>
                    </form>