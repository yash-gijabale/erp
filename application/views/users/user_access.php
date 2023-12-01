<div class="card card-primary">
    <div class="card-header">
        
        <h3 class="card-title"><a href="<?php echo base_url().'index.php/user-list' ?>"><i class="fa fa-chevron-left mx-2" aria-hidden="true"></i></a>User Access Control</h3>
    </div>

    <?php echo form_open('user_access/'.$user) ?>
    <div class="card-body row">

        <?php foreach($modules as $module){ ?>
            <div class="form-group mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="<?php echo $module['module_id']?>" id="flexCheckDefault" name="<?php echo 'module_'.$module['module_id'] ?>" 
                    <?php echo(checkHasUerModuleAccees($user, $module['module_id']) ? 'checked' : '') ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        <b><?php echo $module['module'] ?></b>
                    </label>
                </div>
                <?php if(!empty($module['submodule'])){ 
                    foreach($module['submodule'] as $submodule){
                    ?>
                    <div class="form-check mx-4">
                        <input class="form-check-input" type="checkbox" value="<?php echo $submodule->submodule_id ?>"  id="flexCheckDefault" name="<?php echo 'submodule_'.$module['module_id'].'_'. $submodule->submodule_id ?>"
                        <?php echo(checkHasUerSubmoduleAccees($user, $module['module_id'], $submodule->submodule_id) ? 'checked' : '') ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            <?php echo $submodule->submodule_name ?>
                        </label>
                    </div>

                <?php }}?>

            </div>

        <?php }?>
        
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?php echo form_close() ?>
</div>