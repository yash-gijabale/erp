

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Developer</h3>
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
    <?php echo form_open('add-projects') ?>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Select Developer:</label>
            <select name="developer_id" class="form-select" required>
                <option value="" selected>Select Developer</option>
                <?php foreach($all_developers as $developer){ ?>
                    <option value="<?php echo($developer->developer_id) ?>"><?php echo($developer->developer_name) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Project Name:</label>
            <input type="text" name="project_name" class="form-control" id="exampleInputPassword1" placeholder="Project name" required>
        </div>
        
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">GST Number:</label>
            <input type="text" name="gst_number" class="form-control" id="exampleInputPassword1" placeholder="GST number" required>
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
            <input type="text" name="mr_name" class="form-control" id="exampleInputPassword1" placeholder="Management Representative" required>
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
            <label for="exampleInputPassword1">Start Date:</label>
            <input type="date" name="start_date" class="form-control" id="exampleInputPassword1"required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">End Date:</label>
            <input type="date" name="end_date" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Project Status:</label>
            <input type="text" name="status" class="form-control" id="exampleInputPassword1" placeholder="Status" required>
        </div>
        
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Select Region:</label>
            <select class="form-select" aria-label="Default select example" name="region">
                <option value="" selected>All Regions</option>
                <?php foreach(all_city_data() as $city){ ?>
                <option value="<?php echo $city ?>"><?php echo $city ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Address:</label>
            <textarea  class="form-control" name="address"></textarea>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Select TradeGroups:</label>
            <select name="trade_id[]" class="form-select" multiple required>
                <!-- <option value="" selected>Select Developer</option> -->
                <?php foreach($tradeGroups as $tradeGroup){ ?>
                    <option value="<?php echo($tradeGroup->tradegroup_id) ?>"><?php echo($tradeGroup->tradegroup_name) ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?php echo form_close() ?>
</div>