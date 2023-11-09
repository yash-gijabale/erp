<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Material List</h3>
    </div>
    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Material Name</th>
                    <th>Material Qty</th>
                    <th>Unit Price</th>
                    <th>Total Amount</th>
                    <th>Added At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sr_no = 1; 
                foreach($material_list as $material){
                ?>
                    <tr>
                        <td><?php echo $sr_no ?></td>
                        <td><?php echo $material->material_name ?></td>
                        <td><?php echo $material->material_quantity ?><sub> <?php echo get_material_unit($material->material_unit)?></sub></td>
                        <td><?php echo $material->material_price ?></td>
                        <td><?php echo 'Rs. '.$material->total_amount ?></td>
                        <td><?php echo date('d-M-Y',strtotime($material->added_at)) ?></td>
                        
                        <td>
                            <a href="#" class="btn btn-sm btn-success">Edit</a>
                            <a  onclick="remove_project()" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                       
                    </tr>

                <?php $sr_no++; } ?>
                

            </tbody>
        </table>

    </div>

</div>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
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
</script>