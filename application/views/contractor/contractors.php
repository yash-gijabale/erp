<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">CheckList Master</h3>
    <button class="btn btn-sm btn-warning card-tools" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> New Contractor</button>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Contractor Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sr_no = 1; 
                foreach($checklist as $group){
                ?>
                    <tr>
                        <td><?php echo $sr_no ?></td>
                        <td><?php echo $group->checklist_name ?></td>
                        <td><?php echo getChecklistGroupName($group->checklist_group_id) ?></td>
                        <td><?php echo ($group->status? 'True' : 'False') ?></td>
                        <td>
                           <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateCheckList" onclick="edit('<?php echo $group->checklist_id ?>')"  data-placement="bottom" title="Edit"><i class="fa fa-address-card" aria-hidden="true"></i></button>
                           <button class="btn btn-sm btn-danger" onclick="deleteChecklist('<?php echo $group->checklist_id ?>')" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                           <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#group" onclick="addSubgroup('<?php echo $group->checklist_id ?>')">Group</button>
                           <a href="<?php echo base_url().'index.php/check-list/'.$group->checklist_id ?>" class="btn btn-sm btn-warning">Questions</a>
                        </td>
                       
                    </tr>

                <?php $sr_no++; } ?>
                

            </tbody>
        </table>

    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Contractor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('contractors') ?>
      <div class="modal-body">
        <div class="form-group col-md-12">
            <label>Contractor Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group col-md-12">
            <label>Number:</label>
            <input type="text" name="number" class="form-control" placeholder="Number" required>
        </div>
        <div class="form-group col-md-12">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Jhon@gmail.com" required>
        </div>
        <div class="form-group col-md-12">
            <label>Address:</label>
            <input type="text" name="address" class="form-control" placeholder="Address" required>
        </div>

        <div class="form-check mx-2">
          <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked name='status'>
          <label class="form-check-label" for="flexCheckChecked">
            Active Status
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      <?php echo form_close() ?>

    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    function remove_project(id){
        if(id){
            console.log(id)
            is_remove = confirm('Are you sure want to delete this project ?')
            if(is_remove){
                window.location.href = "<?php echo base_url().'index.php/remove-project/' ?>" + id

            }
        }
    }


    function edit(id)

    {
      console.log(id)
        $('#checklist_id').val(id)
        $.ajax({
            url: "<?php echo base_url().'index.php/checklist/get_checklist';?>",
            type: "post",
            data: { 'checklist_id': id },
            success: function (obj) {
                var group = $.parseJSON(obj);
                console.log(group);
                $('#checklist_name').val(group.checklist_name)

                // $('#checklist_status').val(group.status)
                
                group.status === '1' ? $('#checklist_status').prop('checked', true) :  $('#checklist_status').prop('checked', false)

                $(`select[id^="checklist_group"] option[value="${group.checklist_group_id}"]`).attr("selected","selected");
                // $('#persentage').val(group.persentage_cost)

                // $('#stage_name').val(stage.stage_name)
            }
        })
    }


    function deleteChecklist(id)
    {
        let isDelete = confirm('Are you sure want to delete ?')
        if(isDelete)
        {
            window.location.href = "<?php echo base_url().'index.php/remove-checklist/' ?>" + id
        }
    }

    function addSubgroup(id)
    {
      $('.checklist_id').val(id)
      $('#subgrouplist').empty()
      $('#subgroups').empty()
      $.ajax({
            url: "<?php echo base_url().'index.php/checklist/get_checklist_subgroups';?>",
            type: "post",
            data: { 'checklist_id': id },
            success: function (obj) {
                var group = $.parseJSON(obj);
                console.log(group);
        
                $('#subgroups').append(`
                <option value="">Add new</option>`)
                $.each(group.subgroups, function(key, value){
                    $("#subgroups").append(`
                    <option value="${value.subgroup_id}">${value.subgroup_name}</option>
                    `)
                })

                $.each(group.subgroupList, function(key, value){
                    $("#subgrouplist").append(`
                        <button type="button" class="btn btn-sm btn-outline-primary col-md-3 m-1">${value.subgroup_name}</button>
                    
                    `)
                })
              
            }
        })

    }
</script>