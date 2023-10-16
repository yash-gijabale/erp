<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit User</h3>
    </div>

    <?php echo form_open('edit-user/'.$user->user_id) ?>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">First Name:</label>
            <input type="text" name="first_name" class="form-control" id="exampleInputPassword1" placeholder="First name" value="<?php echo $user->first_name ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Last Name:</label>
            <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="Last Name" value="<?php echo $user->last_name ?>" required>
        </div>
        
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Enter Email:</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="<?php echo $user->email ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Contact Number:</label>
            <input type="text" name="contact_number" class="form-control" id="exampleInputPassword1" placeholder="Contact" value="<?php echo $user->contact ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Select User Type:</label>
            <?php $roles = get_all_roles(); ?>
            <select name="user_type" class="form-select" require>
                <?php foreach($roles as $role){ ?>
                    <option value="<?php echo $role->role_id ?>" <?php echo($user->user_type==$role->role_id ? 'selected' : '')?>><?php echo $role->role_title ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
    <?php echo form_close() ?>
</div>