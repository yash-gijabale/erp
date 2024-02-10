<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Daily Toolbox Meeting</h3>
    </div>
    
    <div class="card-body row">
        <table id="toolbox" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Work Details</th>
                    <th>Work Order No.</th>
                    <th>Work Address</th>
                    <th>Date</th>
                    <th>Contractor</th>
                    <th>Worker List</th>
                </tr>
            </thead>
            <tbody id="subgruop_table">
                <?php $sr_no = 1; 
                foreach($daily_toolbox_list as $list){
                ?>
                <tr>
                    <td><?php echo $sr_no ?></td>    
                    <td><?php echo $list->work_details ?></td>
                    <td><?php echo $list->work_order_no ?></td>
                    <td><?php echo $list->work_location ?></td>
                    <td><?php echo $list->date ?></td>
                    <td><?php echo $list->contractor_name?></td>
                   <td>
                        <a href="<?php echo base_url().'index.php/present-workers/'.$list->id ?>"class="btn btn-sm btn-primary">Show</a>
                        <a href="<?php echo base_url().'index.php/toolbox-form' ?>"class="btn btn-sm btn-primary">Form PDF</a>
                    </td>
                </tr>
                <?php $sr_no++; } ?>
            </tbody>
    </div>  
</div>         

   

    <script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#toolbox").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": true,
                "buttons": ["excel", "pdf", "print"]
            }).buttons().container().appendTo('#toolbox_wrapper .col-md-6:eq(0)');
        });
    </script>        