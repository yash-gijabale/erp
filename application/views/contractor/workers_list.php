<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Workers List</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <div class="card-body">

        <div class="form row my-2">
            <?Php echo form_open('workers-list') ?>
                 <div class="col-md-6 d-flex">
                    <select name="project_id" class="form-control col-md-6">
                        <option value="" selected>select project</option>
                        <?php foreach($projects as $project){ ?>
                            <option value="<?php echo $project->project_id ?>" <?php echo($select_project == $project->project_id ? 'selected' : '') ?> ><?php echo $project->project_name ?></option>
                        <?php } ?>
                    </select>
                    <button type="submit" class="btn btn-sm btn-success col-md-2 mx-2">Get List</button>
                </div>
                <?php echo form_close()?>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Name</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sr_no = 1; ?>
                <?php foreach($worker_list as $worker){ ?>
                    <tr>
                        <td><?php echo $sr_no ?></td>
                        <td><?php echo $worker->worker_name ?></td>
                        <td><?php echo $worker->contact_number ?></td>
                        <td><?php echo $worker->address ?></td>
                        <td><?php echo date('d-M-Y', strtotime($worker->birth_date)) ?></td>
                        <td><?php echo $worker->age ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary">view Docs</button>
                            <button class="btn btn-sm btn-success">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php $sr_no++; } ?>

            </tbody>
        </table>

    </div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="edit-dev-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Developer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('edit-developer') ?>
      <div class="modal-body">
      <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Developer Name:</label>
            <input type="text" name="developer_name" id="developer_name" class="form-control" id="exampleInputEmail1" placeholder="Developer">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleInputPassword1">GST Number:</label>
            <input type="text" name="developer_gst" id="developer_gst" class="form-control" id="exampleInputPassword1" placeholder="GST">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleInputPassword1">Management Representative:</label>
            <input type="text" name="mr_name" class="form-control" id="mr_name" placeholder="Management Representative">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleInputPassword1">Enter Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleInputPassword1">Contact Number:</label>
            <input type="text" name="contact_number" class="form-control" id="contact_number" placeholder="Contact">
        </div>
        <input type="hidden" name="developer_id" id="developer_id" value="">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update</button>
      </div>
      <?php echo form_close() ?>

    </div>
  </div>
</div>



    
</div>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "print"],
            "language": {
                        "emptyTable": "No Data Found !"
                        }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
   


    function edit_developer(id){
        console.log(id);
        $developer_id = id;
        $.ajax({
            url:"<?php echo base_url().'index.php/developers/get_developer_by_id' ?>",
            type: "post",
            data:{'developer_id' : $developer_id},
            success: function (obj){
                developer = $.parseJSON(obj)
                if(developer){
                    $('#developer_name').val(developer.developer_name);
                    $('#developer_gst').val(developer.gst_number);
                    $('#mr_name').val(developer.mr_name);
                    $('#email').val(developer.email_id);
                    $('#contact_number').val(developer.contact_number);
                    $('#developer_id').val(developer.developer_id);
                }
            }

        })
    }

    function remove_developer(id){
        if(id){
            is_remove = confirm('Are you sure want to delete this developer ?')
            if(is_remove){
                window.location.href = "<?php echo base_url().'index.php/remove-developer/' ?>" + id
            }
        }
    }
</script>