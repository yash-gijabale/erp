<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Workers List</h3>
    </div>
    
    <div class="card-body row">
        <table id="toolbox" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Name</th>
                    <th>Signature</th>
                </tr>
            </thead>
            <tbody>
            <?php $sr_no = 1; 
                foreach($present_workers as $worker){
                ?>
                <tr>
                    <td><?php echo $sr_no ?></td>    
                    <td><?php echo $worker->name ?></td>
                    <td><?php echo $worker->signature ?></td>
                </tr>
            <?php $sr_no++; } ?>
            </tbody> 
        </table>
    </div>
</div>

<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>