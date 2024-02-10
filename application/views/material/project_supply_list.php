<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo 'Project Name: '. get_projectname_by_id($project_id) ?></h3><br>
        <!-- <h3 class="card-title"></h3> -->
        <div class="card-tools">

        </div>
    </div>

    <div class="card-body row">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Material Name</th>
                    <th>Material Quntity</th>
                    <th>Total Amount</th>
                    <th>Supply Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $sr_no = 1; 
                foreach($project_supply_list as $material){
                ?>
                <tr>
                    <td>
                        <?php echo $sr_no?>
                    </td>
                    <td>
                        <?php echo get_material_name($material->material_id)?>
            
                    </td>
                    <td>
                        <?php echo $material->material_qauntity ?>
                    </td>
                    
                    <td>
                        <?php echo 'Rs. '.$material->total_amount ?>
                    </td>
                     <td>
                        <?php echo date('d-M-Y',strtotime($material->supply_at)) ?>
                    </td>
                </tr>
                <?php $sr_no++; }?>
                
                </tbody>
        </table>
    </div>
</div>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery/toWord.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>