<style>
    .kamban-card-body {
        height: 400px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .role-kamban-card-body{
        height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }
</style>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Developer</h3>
    </div>

    <?php echo form_open('wbs-user-allocation') ?>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Select Developer:</label>
            <select name="developer_id" id="developer" class="form-select" required>
                <option value="" selected>Select Developer</option>
                <?php foreach($all_developers as $developer){ ?>
                <option value="<?php echo($developer->developer_id) ?>">
                    <?php echo($developer->developer_name) ?>
                </option>
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
                </div>
            </div>
        </section>
    </div>
    <div class="row m-2">
        <label class="bg-warning">WBS user allocation:</label>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Select TradeGroup:</label>
                <select name="tradegroup_id" id="tradegroup_id" class="form-select" required>
                <option value="" selected class="text-danger">Select trade group</option>

                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Select Trade:</label>
                <select name="trade_id" id="trade_id" class="form-select" required>
                    <option value="" selected class="text-danger">Select trade</option>

                </select>
            </div>
        </div>
        <div class="row">
            <section class="content pb-3 col-md-3">
                <div class="container-fluid">
                    <div class="card card-row card-info p-0">
                        <div class="card-header">
                            <h3 class="card-title">
                                Site Enginners
                            </h3>
                        </div>
                        <div class="card-body role-kamban-card-body" id="site-enginner-list">

                        </div>
                    </div>
                </div>
            </section>
            <section class="content pb-3 col-md-3">
                <div class="container-fluid">
                    <div class="card card-row card-info p-0">
                        <div class="card-header">
                            <h3 class="card-title">
                                Responsible
                            </h3>
                        </div>
                        <div class="card-body role-kamban-card-body" id="responsible-list">

                        </div>
                    </div>
                </div>
            </section>
            <section class="content pb-3 col-md-3">
                <div class="container-fluid">
                    <div class="card card-row card-info p-0">
                        <div class="card-header">
                            <h3 class="card-title">
                                Reviewers
                            </h3>
                        </div>
                        <div class="card-body role-kamban-card-body" id="reviewer-list">

                        </div>
                    </div>
                </div>
            </section>
            <section class="content pb-3 col-md-3">
                <div class="container-fluid">
                    <div class="card card-row card-info p-0">
                        <div class="card-header">
                            <h3 class="card-title">
                                Approvals
                            </h3>
                        </div>
                        <div class="card-body role-kamban-card-body" id="approval-list">

                        </div>
                    </div>
                </div>
            </section>
        </div>

        <button type="submit" class="btn btn-sm btn-success col-md-2 mb-4">Save</button>
    </div>
</div>
    <?php echo form_close() ?>


<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    $("#developer").change(function () {
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
                $.each(projects, function (key, val) {
                    // console.log(val.project_name);
                    $('.project_select').append(`<option value="${val.project_id}">${val.project_name}</option>`)
                })
            }
        })

    });

    function getAllStructures(projectId) {
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_structures_by_project_id';?>",
            type: "post",
            data: { 'project_id': projectId },
            success: function (obj) {
                var structures = $.parseJSON(obj);
                $('#all_structure').empty();
                $.each(structures, function (key, val) {
                    // console.log(val.project_name);
                    $('#all_structure').append(`
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.structure_name}</h5>
                            <div class="card-tools">
                            <input class="form-check-input structure_check" id="structure_check" name="structure_ckeck" onclick="get_structure_Value()" type="checkbox" value="${val.structure_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                })
            }
        })
    }

    $("#project_id").change(function () {
        var project_id = $(this).val();
        $('.project-id-hidden').val(project_id)
        $('#all_structure').html(`
                <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
                </div>
        `)

        getAllStructures(project_id)

    });


    //--------------------------------------FUNCTION FOR STAGES/FLOOR----------------------------------------

    function getAllFoorsByStructure(structureId) {
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_stages_by_structure_id';?>",
            type: "post",
            data: { 'structure_id': structureId },
            success: function (obj) {
                var stages = $.parseJSON(obj);
                $('#all_stages').empty();
                // console.log(stages);
                $.each(stages, function (key, val) {
                    $('#all_stages').append(`
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.stage_name}</h5>
                            <div class="card-tools">
                            <input class="form-check-input stage_check" id="stage_check" name="stage_ckeck[]" onclick="get_stage_Value()" type="checkbox" value="${val.stage_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                })
            }

        });
    }
    function get_structure_Value() {
        $('input:checkbox[id=structure_check]:checked').each(function () {
            // $('.project-id-hidden').val(project_id)
            structure_id = $(this).val();
            console.log(structure_id)
            $('.structure_id').val(structure_id);
            getAllFoorsByStructure(structure_id);

        })
    }


    //-----------------------------/FUNCTION FOR STAGES---------------------------------------------



    //-----------------------------FUNCTION FOR UNIT OPERATIONS------------------------------------

    function getAllUnitsByStage(stageId) {
        // var stageId = $('.stage_id').val();

        $.ajax({
            url: "<?php echo base_url().'index.php/projects/get_units_by_stage_id';?>",
            type: "post",
            data: { 'stage_id': stageId },
            success: function (obj) {
                var units = $.parseJSON(obj);
                $('#all_units').empty();
                $.each(units, function (key, val) {
                    // console.log(val.project_name);
                    $('#all_units').append(`
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.unit_code}</h5>
                            <div class="card-tools">
                            <input class="form-check-input unit_check" id="unit_check" name="unit_ckeck[]" onclick="get_unit_Value()" type="checkbox" value="${val.unit_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                })
            }

        });
    }
    function get_stage_Value() {
        $('input:checkbox[id=stage_check]:checked').each(function () {
            // $('.project-id-hidden').val(project_id)
            stage_id = $(this).val();
            $('.stage_id').val(stage_id);

            getAllUnitsByStage(stage_id);
        })
    }


    function get_unit_Value() {
        $('input:checkbox[id=unit_check]:checked').each(function () {
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
                    $.each(subunits, function (key, val) {
                        // console.log(val.project_name);
                        $('#all_subunits').append(`
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">${val.subunit_name}</h5>
                            <div class="card-tools">
                            <input class="form-check-input subunit_check" id="subunit_check" name="subunit_ckeck[]" type="checkbox" value="${val.subunit_id}" id="defaultCheck1">
                            </div>
                        </div>
                    </div>
                    `)
                    })
                }

            });
        })
    }


    $("#project_id").change(function () {
        var project_id = $(this).val();
        $.ajax({
            url: "<?php echo base_url().'index.php/projects/getAllocatedUserByProject';?>",
            type: "post",
            data: { 'project_id': project_id },
            success: function (obj) {
                userlist = JSON.parse(obj)
                console.log(userlist)
                $('#site-enginner-list').empty()
                $('#responsible-list').empty()
                $('#reviewer-list').empty()
                $('#approval-list').empty()
                $('#tradegroup_id').empty()
                $('#trade_id').empty()

                var siteEnginners = userlist.SiteEngineer;
                var responsibles = userlist.Responsible;
                var reviewers = userlist.Reviewer;
                var approvals = userlist.Approvar;
                var tradegroups = userlist.tradeGroups;
                $.each(siteEnginners, function(key, val){
                    $('#site-enginner-list').append(`
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="userlist[]" value="${val.user_id}" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        ${val.first_name} ${val.last_name}
                    </label>
                    </div>`)
                })

                $.each(responsibles, function(key, val){
                    $('#responsible-list').append(`
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="userlist[]" value="${val.user_id}" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        ${val.first_name} ${val.last_name}
                    </label>
                    </div>`)
                })

                $.each(reviewers, function(key, val){
                    $('#reviewer-list').append(`
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="userlist[]" value="${val.user_id}" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        ${val.first_name} ${val.last_name}
                    </label>
                    </div>`)
                })

                $.each(approvals, function(key, val){
                    $('#approval-list').append(`
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="userlist[]" value="${val.user_id}" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        ${val.first_name} ${val.last_name}
                    </label>
                    </div>`)
                })

                $.each(tradegroups, function(key, val){
                    $('#tradegroup_id').append(`
                        <option value="${val.tradegroup_id}">${val.tradegroup_name}</option>
                    `)
                })
            }
        })

    });

    $("#tradegroup_id").change(function(){   
        var tradegroup_id = $(this).val();
        $.ajax({
            url: "<?php echo base_url().'index.php/trade/get_trade_by_tradegroup';?>",
            type: "post",
            data: { 'tradegroup_id': tradegroup_id },
            success: function (obj) {
                var trades = $.parseJSON(obj);
                $('#trade_id').empty();
                $.each(trades, function(key, val){
                    $('#trade_id').append(`<option value="${val.trade_id}">${val.trade_name}</option>`)
                })
            }
        })
    
    });
</script>