<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">New User</h3>
    </div>

    <?php echo form_open('new-user') ?>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">First Name:</label>
            <input type="text" name="first_name" class="form-control" id="exampleInputPassword1" placeholder="First name" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Last Name:</label>
            <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="Last Name" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Enter Password:</label>
            <input type="Password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">Show</label>
            </div> -->
        </div>
        
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Enter Email:</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Contact Number:</label>
            <input type="text" name="contact_number" class="form-control" id="exampleInputPassword1" placeholder="Contact" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Select User Type:</label>
            <?php $roles = get_all_roles(); ?>
            <select name="user_type" class="form-select" require>
                <option value="" selected>Select Type</option>
                <?php foreach($roles as $role){ ?>
                    <option value="<?php echo $role->role_id ?>"><?php echo $role->role_title ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?php echo form_close() ?>
</div>