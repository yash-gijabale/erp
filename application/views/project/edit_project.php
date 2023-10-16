<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Project</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php if(isset($submit_status)){ 
        if($submit_status){ ?>
            <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
            <?php echo $submit_msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    <?php }else{ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $submit_msg;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    <?php } } ?>
    <?php echo form_open('edit-project/'.$project->project_id) ?>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Select Developer:</label>
            <select name="developer_id" class="form-select" required>
                <option value="">Select Developer</option>
                <?php foreach($all_developers as $developer){ ?>
                    <option value="<?php echo($developer->developer_id) ?>" <?php echo($project->developer_id == $developer->developer_id ? 'selected' : '') ?>><?php echo($developer->developer_name) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Project Name:</label>
            <input type="text" name="project_name" class="form-control" id="exampleInputPassword1" placeholder="Project name" value="<?php echo $project->project_name ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Enter Location:</label>
            <input type="text" name="project_location" class="form-control" id="exampleInputPassword1" placeholder="Location" value="<?php echo $project->project_location?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Enter configuration:</label>
            <input type="text" name="project_configuration" class="form-control" id="exampleInputPassword1" placeholder="Configuration" value="<?php echo $project->configuration ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Select Type:</label>
            <select name="project_type" class="form-select" require>
                <option value="" selected>Select Type</option>
                <option value="1">Residential</option>
                <option value="2">Commercial</option>
                <option value="3">Infra</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Management Representative:</label>
            <input type="text" name="mr_name" class="form-control" id="exampleInputPassword1" placeholder="Management Representative" value="<?php echo $project->mr_name ?>"  required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Enter Email:</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="<?php echo $project->email_id ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Contact Number:</label>
            <input type="text" name="contact_number" class="form-control" id="exampleInputPassword1" placeholder="Contact" value="<?php echo $project->contact_number ?>" required>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
    <?php echo form_close() ?>
</div>