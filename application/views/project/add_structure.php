<style>
    .kamban-card-body{
        height: 400px;
        overflow-y: auto;
        overflow-x: hidden;
    }
</style>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Developer</h3>
    </div>

    <!-- <?php echo form_open('add-developers') ?> -->
    <div class="card-body row">
        <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Select Developer:</label>
                <select name="developer_id" id="developer" class="form-select" required>
                    <option value="" selected>Select Developer</option>
                    <?php foreach($all_developers as $developer){ ?>
                        <option value="<?php echo($developer->developer_id) ?>"><?php echo($developer->developer_name) ?></option>
                    <?php } ?>
                </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Select Project:</label>
            <select name="project_id" id="project_id" class="form-select project_select" required>
                <option value="" selected class="text-danger">Select Developer First</option>
               
            </select>
        </div>
      
       
    </div>
    
    <!-- <?php echo form_close() ?> -->


<div class="wrapper kanban row">
 
    <section class="content pb-3 col-md-3">
      <div class="container-fluid">
        <div class="card card-row card-primary p-0">
          <div class="card-header">
            <h3 class="card-title">
              Structures
            </h3>
          </div>
          <div class="card-body kamban-card-body" id="all_structure">
               
          </div>
          <div class="card-footer">
            <div class="row col-md-12 d-flex justify-content-around">
                <button type="button" class="btn btn-outline-success btn-sm col-md-3 m-1" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-primary btn-sm col-md-3 m-1" onclick="edit_strucutre()" data-toggle="modal" data-target="#edit_structure"><i class="fa fa-paint-brush" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm col-md-3 m-1"  onclick="remove_structures()"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3 col-md-3">
      <div class="container-fluid">
        <div class="card card-row card-success p-0">
          <div class="card-header">
            <h3 class="card-title">
              Stages
            </h3>
          </div>
          <div class="card-body kamban-card-body" id="all_stages">
               
          </div>
          <div class="card-footer">
            <div class="row col-md-12 d-flex justify-content-around">
                <button type="button" class="btn btn-outline-success btn-sm col-md-3 m-1" data-toggle="modal" data-target="#add_stage"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-primary btn-sm col-md-3 m-1" data-toggle="modal" data-target="#edit_stage" onclick="edit_stage()" data-toggle="modal" data-target="#edit_structure"><i class="fa fa-paint-brush" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm col-md-3 m-1" onclick="remove_stages()"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3 col-md-3">
      <div class="container-fluid">
        <div class="card card-row card-info p-0">
          <div class="card-header">
            <h3 class="card-title">
              Units
            </h3>
          </div>
          <div class="card-body kamban-card-body" id="all_units">
               
          </div>
          <div class="card-footer">
            <div class="row col-md-12 d-flex justify-content-around">
                <button type="button" class="btn btn-outline-success btn-sm col-md-3 m-1" data-toggle="modal" data-target="#add_unit"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-primary btn-sm col-md-3 m-1" onclick="edit_unit()" data-toggle="modal" data-target="#edit_unit"><i class="fa fa-paint-brush" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm col-md-3 m-1"  onclick="remove_units()"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3 col-md-3">
      <div class="container-fluid">
        <div class="card card-row card-secondary p-0">
          <div class="card-header">
            <h3 class="card-title">
              Subunits
            </h3>
          </div>
          <div class="card-body kamban-card-body" id="all_subunits">
               
          </div>
          <div class="card-footer">
            <div class="row col-md-12 d-flex justify-content-around">
                <button type="button" class="btn btn-outline-success btn-sm col-md-3 m-1" data-toggle="modal" data-target="#add_subunit"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-primary btn-sm col-md-3 m-1" onclick="edit_subunit()" data-toggle="modal" data-target="#edit_subunit"><i class="fa fa-paint-brush" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm col-md-3 m-1"  onclick="remove_subunits()"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>



    <!-- Add Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new structure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('add-structure') ?>
                <!-- <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Select Project:</label>
                    <select name="project_id" class="form-select project_select" required>
                        <option value="" selected>Select Project</option>
                    
                    </select>
                </div> -->
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Structure Name:</label>
                    <input type="text" name="structure_name" class="form-control" id="exampleInputEmail1" placeholder="Strucute">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Structure Area:</label>
                    <input type="text" name="structure_area" class="form-control" id="exampleInputEmail1" placeholder="Eg. 50,000 sq.">
                </div>
               
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <input type="hidden" name="project_id" value="" class="project-id-hidden">
                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /Add Modal -->

     <!-- Edit Modal -->
     <div class="modal fade" id="edit_structure" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit structure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('edit-structure') ?>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Structure Name:</label>
                    <input type="text" name="structure_name" id="structure_name" class="form-control"  placeholder="Strucute">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Structure Area:</label>
                    <input type="text" name="structure_area" id="structure_area" class="form-control"  placeholder="Eg. 50,000 sq.">
                </div>
                <input type="hidden" name="project_id" value="" class="project-id-hidden">
                <input type="hidden" name="structure_id" class="structure_id" value="">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /edit Modal -->

    <!-- add stage modal -->
    <div class="modal fade" id="add_stage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new stage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('add-stage') ?>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Stage Name:</label>
                    <input type="text" name="stage_name" class="form-control" id="exampleInputEmail1" placeholder="Stage">
                </div>
            
                <input type="hidden" name="structure_id" value="" class="structure_id">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /add stage modal -->
    <!-- Edit stage Modal -->
    <div class="modal fade" id="edit_stage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Stage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('edit-stage') ?>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Stage Name:</label>
                    <input type="text" name="stage_name" id="stage_name" class="form-control" id="exampleInputEmail1" placeholder="Stage">
                </div>
            
                <input type="hidden" name="stage_id" value="" class="stage_id">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /edit steg Modal -->

    <!-- add unit modal -->
    <div class="modal fade" id="add_unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new Flat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('add-unit') ?>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Flat No.:</label>
                    <input type="text" name="unit_code" class="form-control" id="exampleInputEmail1" placeholder="Flat no">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Unit Area.:</label>
                    <input type="text" name="unit_area" class="form-control" id="exampleInputEmail1" placeholder="Area">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Unit Type.:</label>
                    <select name="unit_type" class="form-select" required>
                        <option value="" selected class="text-danger">Select Unit type</option>
                        <option value="1" >1Rk</option>
                        <option value="2" >1BHK</option>
                        <option value="3" >2BHK</option>
                        <option value="4" >3BHK</option>
                    </select>
                </div>
            
                <input type="hidden" name="stage_id" value="" class="stage_id">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /add Unit modal -->
    <!-- Edit stage Modal -->
    <div class="modal fade" id="edit_unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('edit-unit') ?>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Flat No.:</label>
                    <input type="text" name="unit_code" id="unit_code" class="form-control" id="exampleInputEmail1" placeholder="Flat no">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Unit Area.:</label>
                    <input type="text" name="unit_area" id="unit_area" class="form-control" id="exampleInputEmail1" placeholder="Area">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Unit Type.:</label>
                    <select name="unit_type" id="unit_type" class="form-select" required>
                        <option value="1" >1Rk</option>
                        <option value="2" >1BHK</option>
                        <option value="3" >2BHK</option>
                        <option value="4" >3BHK</option>
                    </select>
                </div>
            
                <input type="hidden" name="unit_id" value="" class="unit_id">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /edit steg Modal -->

     <!-- add subunit modal -->
     <div class="modal fade" id="add_subunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new Subunit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('add-subunit') ?>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Enter Name:</label>
                    <input type="text" name="subunit_name" id="stage_name" class="form-control" id="exampleInputEmail1" placeholder="Flat no">
                </div>
        
                <input type="hidden" name="unit_id" value="" class="unit_id">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /add subUnit modal -->
    <!-- Edit stage Modal -->
    <div class="modal fade" id="edit_subunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit subunit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('edit-subunit') ?>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Subunit Name:</label>
                    <input type="text" name="subunit_name" id="subunit_name" class="form-control" id="exampleInputEmail1" placeholder="Stage">
                </div>
        
                <input type="hidden" name="subunit_id" value="" class="subunit_id">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </div>
    <!-- /edit steg Modal -->

<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $("#developer").change(function(){   
        var developer_id = $(this).val();
        $('#all_structure').empty();

        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_projects_by_dev_id';?>",
            type: "post",
            data: { 'developer_id': developer_id },
            success: function (obj) {
                var projects = $.parseJSON(obj);
                $('.project_select').empty();
                $('.project_select').append(`<option value="" selected>Select Project</option>`)
                $.each(projects, function(key, val){
                    // console.log(val.project_name);
                    $('.project_select').append(`<option value="${val.project_id}">${val.project_name}</option>`)
                })
            }
        })
    
});

$("#project_id").change(function(){   
        var project_id = $(this).val();
        $('#all_structure').html(`
                <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
                </div>
        `)
        $('.project-id-hidden').val(project_id)
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_structures_by_project_id';?>",
            type: "post",
            data: { 'project_id': project_id },
            success: function (obj) {
                var structures = $.parseJSON(obj);
                // console.log(projects);
                 $('#all_structure').empty();
                $.each(structures, function(key, val){
                    // console.log(val.project_name);
                    $('#all_structure').append(`
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.structure_name}</h5>
                            <div class="card-tools">
                            <input class="form-check-input structure_check" name="structure_ckeck" onclick="get_structure_Value()" type="checkbox" value="${val.structure_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                })
            }
        })
    
});


function edit_strucutre(){ 
    // $(".structure_check").change(function() {
    //     if(this.checked) {
    //         console.log('click')
    //     }
    // });
    $('input:checkbox[name=structure_ckeck]:checked').each(function() 
    {
        structure_id = $(this).val();
        $('.structure_id').val(structure_id);
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_structures_by_structure_id';?>",
            type: "post",
            data: { 'structure_id': structure_id },
            success: function (obj) {
                var structure = $.parseJSON(obj);
                // console.log(structures);
                $('#structure_name').val(structure.structure_name)
                $('#structure_area').val(structure.structure_area)
            }
        })
    });
}


function get_structure_Value(){
    $('input:checkbox[name=structure_ckeck]:checked').each(function() 
    {
        // $('.project-id-hidden').val(project_id)
        structure_id = $(this).val();
        $('.structure_id').val(structure_id);
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_stages_by_structure_id';?>",
            type: "post",
            data: { 'structure_id': structure_id },
            success: function (obj) {
                var stages = $.parseJSON(obj);
                // console.log(stages);
                // $('#structure_name').val(structure.structure_name)
                // $('#structure_area').val(structure.structure_area)
                $('#all_stages').empty();
                $.each(stages, function(key, val){
                    // console.log(val.project_name);
                    $('#all_stages').append(`
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.stage_name}</h5>
                            <div class="card-tools">
                            <input class="form-check-input stage_check" name="stage_ckeck" onclick="get_stage_Value()" type="checkbox" value="${val.stage_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                })
            }
        
    });
})
}

function get_stage_Value(){
    $('input:checkbox[name=stage_ckeck]:checked').each(function() 
    {
        // $('.project-id-hidden').val(project_id)
        stage_id = $(this).val();
        $('.stage_id').val(stage_id);
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_units_by_stage_id';?>",
            type: "post",
            data: { 'stage_id': stage_id },
            success: function (obj) {
                var units = $.parseJSON(obj);
                // var units = obj;
                // console.log(units);
                // $('#structure_name').val(structure.structure_name)
                // $('#structure_area').val(structure.structure_area)
                $('#all_units').empty();
                $.each(units, function(key, val){
                    // console.log(val.project_name);
                    $('#all_units').append(`
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.unit_code}</h5>
                            <div class="card-tools">
                            <input class="form-check-input unit_check" name="unit_ckeck" onclick="get_unit_Value()" type="checkbox" value="${val.unit_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                })
            }
        
    });
})
}

function edit_stage(){ 
    console.log('click')
    $('input:checkbox[name=stage_ckeck]:checked').each(function() 
    {
        stage_id = $(this).val();
        $('.stage_id').val(stage_id);
        // console.log(stage_id)
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_stage_by_stage_id';?>",
            type: "post",
            data: { 'stage_id': stage_id },
            success: function (obj) {
                var stage = $.parseJSON(obj);
                // console.log(stage);
                $('#stage_name').val(stage.stage_name)
            }
        })
    });
}


function get_unit_Value(){
    $('input:checkbox[name=unit_ckeck]:checked').each(function() 
    {
        // $('.project-id-hidden').val(project_id)
        unit_value = $(this).val();
        $('.unit_id').val(unit_value);
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_subunit_by_unit_id';?>",
            type: "post",
            data: { 'unit_id': unit_value },
            success: function (obj) {
                var subunits = $.parseJSON(obj);
                // var units = obj;
                // console.log(units);
                // $('#structure_name').val(structure.structure_name)
                // $('#structure_area').val(structure.structure_area)
                $('#all_subunits').empty();
                $.each(subunits, function(key, val){
                    // console.log(val.project_name);
                    $('#all_subunits').append(`
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.subunit_name}</h5>
                            <div class="card-tools">
                            <input class="form-check-input subunit_check" name="subunit_ckeck" type="checkbox" value="${val.subunit_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                })
            }
        
    });
})
}
function edit_unit(){ 
    $('input:checkbox[name=unit_ckeck]:checked').each(function() 
    {
        unit_id = $(this).val();
        $('.unit_id').val(unit_id);
        // console.log(unit_id)
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_unit_by_unit_id';?>",
            type: "post",
            data: { 'unit_id': unit_id },
            success: function (obj) {
                var unit = $.parseJSON(obj);
                // console.log(unit);
                $('#unit_code').val(unit.unit_code)
                $('#unit_area').val(unit.unit_area)
                $(`#unit_type option[value=${unit.unit_type}]`).attr('selected','selected');
            }
        })
    });
}

function edit_subunit(){ 
    $('input:checkbox[name=unit_ckeck]:checked').each(function() 
    {
        subunit_id = $(this).val();
        $('.subunit_id').val(subunit_id);
        // console.log(unit_id)
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_subunit_by_subunit_id';?>",
            type: "post",
            data: { 'subunit_id': subunit_id },
            success: function (obj) {
                var subunit = $.parseJSON(obj);
                $('#subunit_name').val(subunit.subunit_name)
                // $('#unit_area').val(unit.unit_area)
                // $(`#unit_type option[value=${unit.unit_type}]`).attr('selected','selected');
            }
        })
    });
}
function remove_structures(){
    var structures_id = {}
    $('input:checkbox[name=structure_ckeck]:checked').each(function(i) 
    {
        structures_id[i] = $(this).val();
    })
    var structures = JSON.stringify(structures_id);
    // console.log(stages);
    $.ajax({
            url: "<?php echo base_url().'index.php/projects/remove_structure';?>",
            type: "post",
            data: { 'structures': structures },
            success: function (obj) {
                console.log(obj);
                location.reload();
                // $('#subunit_name').val(subunit.subunit_name)
                // $('#unit_area').val(unit.unit_area)
                // $(`#unit_type option[value=${unit.unit_type}]`).attr('selected','selected');
            }
        })
}

function remove_stages(){
    var stages_id = {}
    $('input:checkbox[name=stage_ckeck]:checked').each(function(i) 
    {
        stages_id[i] = $(this).val();
    })
    var stages = JSON.stringify(stages_id);
    console.log(stages);
    $.ajax({
            url: "<?php echo base_url().'index.php/projects/remove_stages';?>",
            type: "post",
            data: { 'stages': stages },
            success: function (obj) {
                console.log(obj);
                location.reload();
                // $('#subunit_name').val(subunit.subunit_name)
                // $('#unit_area').val(unit.unit_area)
                // $(`#unit_type option[value=${unit.unit_type}]`).attr('selected','selected');
            }
        })
}

function remove_units(){
    var units_id = {}
    $('input:checkbox[name=unit_ckeck]:checked').each(function(i) 
    {
        units_id[i] = $(this).val();
    })
    var units = JSON.stringify(units_id);
    console.log(units);
    $.ajax({
            url: "<?php echo base_url().'index.php/projects/remove_units';?>",
            type: "post",
            data: { 'units': units },
            success: function (obj) {
                console.log(obj);
                // $('#subunit_name').val(subunit.subunit_name)
                // $('#unit_area').val(unit.unit_area)
                // $(`#unit_type option[value=${unit.unit_type}]`).attr('selected','selected');
            }
        })
}
function remove_subunits(){
    var subunits_id = {}
    $('input:checkbox[name=subunit_ckeck]:checked').each(function(i) 
    {
        subunits_id[i] = $(this).val();
    })
    var subunits = JSON.stringify(subunits_id);
    console.log(subunits);
    $.ajax({
            url: "<?php echo base_url().'index.php/projects/remove_subunits';?>",
            type: "post",
            data: { 'subunits': subunits },
            success: function (obj) {
                console.log(obj);
                // $('#subunit_name').val(subunit.subunit_name)
                // $('#unit_area').val(unit.unit_area)
                // $(`#unit_type option[value=${unit.unit_type}]`).attr('selected','selected');
            }
        })
}


function handle_add_subunit(){

}
</script>