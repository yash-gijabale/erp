<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Supply List</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body row">
           <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Developer Name</th>
                    <th>Porject Name</th>
                    <!-- <th>Material Name</th>
                    <th>Material Qauntity</th> -->
                    <th>Total Amount</th>
                    <!-- <th>Added At</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sr_no = 1; 
                foreach($supply_list as $material){
                ?>
                <tr>
                    <td>
                        <?php echo $sr_no ?>
                    </td>
                    <td>
                        <?php echo get_developer_by_id($material->developer_id) ?>
                    </td>
                    <td>
                        <?php echo get_projectname_by_id($material->project_id) ?>
                    </td>
                    
                    <td>
                        <?php echo 'Rs. '.$material->total_amount ?>
                    </td>

                    <td>
                        <a href="<?php echo base_url().'index.php/project-supply-list/'.$material->project_id?>" class="btn btn-sm btn-success">List</a>
                        <a onclick="remove_project()" class="btn btn-sm btn-danger">Delete</a>
                    </td>

                </tr>

                <?php $sr_no++; } ?>


            </tbody>
        </table>

    </div>

</div>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery/toWord.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    function remove_project(id) {
        if (id) {
            console.log(id)
            is_remove = confirm('Are you sure want to delete this project ?')
            if (is_remove) {
                window.location.href = "<?php echo base_url().'index.php/remove-supply/' ?>" + id

            }
        }
    }

    jQuery(document).ready(function ($) {
        $("#export").click(function (event) {
            $("#example1").wordExport();
        });
    });


</script>