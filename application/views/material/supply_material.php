<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Supplyment</h3>
        <a class="card-tools btn btn-warning text-dark" href="<?php echo base_url().'index.php/supply-list' ?>">List</a>
    </div>
    <?php echo form_open('supply-material') ?>
    <div class="card-body row">
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Select Developer:</label>
            <select name="developer_id" id="developer_select" class="form-select" required>
                <option value="" selected>Select Developer</option>
                <?php foreach($all_developers as $developer){ ?>
                <option value="<?php echo($developer->developer_id) ?>">
                    <?php echo($developer->developer_name) ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Select Project:</label>
            <select name="project_id" id="project_select" class="form-select">
                <option value="" selected>Select Project</option>
            </select>
        </div>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">SR</th>
                    <th scope="col">Material</th>
                    <th scope="col">Material Qty</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total Amount</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">1</th>
                    <td><select name="material_id" id="material_select" class="form-select">
                            <option value="" selected>Select Material</option>
                        </select></td>
                    <td><input type="text" name="material_qty" class="form-control" id="unit_qty"
                            placeholder="Material Qty"></td>
                    <td><input type="text" name="unit_price" class="form-control" id="unit_price"
                            placeholder="Unit Price"></td>
                    <td><input type="text" name="total_amount" class="form-control" id="total_amount"
                            placeholder="Total Amount"></td>
                </tr>
            </tbody>
        </table>
        <div class="card-footer d-flex justify-content-end">
            <button type="button" id="addRowBtn" class="btn btn-primary btn-sm p-0 col-md-1">Add Row</button>
        </div>

        <div class="card-footer d-flex">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
        <?php echo form_close() ?>
    </div>

    <script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script>

        var new_material
        var count = 2
        $('#addRowBtn').on('click', function () {
            $('table').find('tbody').append(`<tr>
                    <th scope="row">${count}</th>
                    <td><select name="material_id" id="material_select" class="form-select material-select">
                            <option value="" selected>Select Material</option>
                        </select></td>
                    <td><input type="text" name="material_qty" class="form-control" id="unit_qty"
                            placeholder="Material Qty"></td>
                    <td><input type="text" name="unit_price" class="form-control" id="unit_price"
                            placeholder="Unit Price"></td>
                    <td><input type="text" name="total_amount" class="form-control" id="total_amount"
                            placeholder="Total Amount"></td>
                </tr>`);
            count++;

        });



        $('#unit_qty').on('input', () => {
            var unit_price = $('#unit_price').val()
            var unit_qty = $('#unit_qty').val()

            var total_amount = unit_price * unit_qty
            // console.log(total_stock)

            if (isNaN(total_amount)) {
                $('#total_amount').val('Enter Number Only !');
            } else {
                $('#total_amount').val(total_amount);
            }

        })


        $("#developer_select").change(function () {
            var developer_id = $(this).val();
            $.ajax({
                url: "<?php echo base_url().'index.php/projects/get_projects_by_dev_id';?>",
                type: "post",
                data: { 'developer_id': developer_id },
                success: function (obj) {
                    var projects = $.parseJSON(obj);
                    $('#project_select').empty();
                    $('#project_select').append(`<option selected>Select Projects</option>`)
                    $.each(projects, function (key, val) {
                        // console.log(val.project_name);
                        $('#project_select').append(`<option value="${val.project_id}">${val.project_name}</option>`)
                    })
                }
            })

        });

        $("#project_select").change(function () {
            var projectId = $(this).val();
            var developerId = $('#developer_select').val()
            $.ajax({
                url: "<?php echo base_url().'index.php/materialManegement/get_material_by_dev_and_project_id';?>",
                type: "post",
                data: { 'developer_id': developerId, 'project_id': projectId },
                success: function (obj) {
                    var materials = $.parseJSON(obj);
                    console.log(materials);
                    $('#material_select').empty();
                    $('#material_select').append(`<option selected>Select Material</option>`)
                    $.each(materials, function (key, val) {
                        // console.log(val.project_name);
                        $('#material_select').append(`<option value="${val.material_id}">${val.material_name}</option>`)
                    })
                }
            })

        });

        $("#material_select").change(function () {
            var material_id = $(this).val();
            $.ajax({
                url: "<?php echo base_url().'index.php/materialManegement/get_material_data';?>",
                type: "post",
                data: { 'material_id': material_id },
                success: function (obj) {
                    var material = $.parseJSON(obj);
                    console.log(material)
                    $('#unit_qty').attr("placeholder", `Available Stock: ${material.material_quantity}`)
                    $('#unit_price').val(material.material_price)
                    // $('#total_stock').val(material.material_quantity)
                }
            })

        });

    </script>