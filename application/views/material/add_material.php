<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Trade</h3>
        <a class="card-tools btn btn-warning text-dark" href="<?php echo base_url().'index.php/material-list' ?>">List</a>
    </div>
    <?php echo form_open('add-material') ?>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Material Name:</label>
            <input type="text" name="material_name" class="form-control" id="exampleInputPassword1" placeholder="Material name" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Select Units:</label>
            <select name="material_unit" class="form-control">
                <option value="" selected>Select Units</option>
                <?php foreach($measures as $measure){ ?>
                    <option value="<?php echo $measure->measure_id ?>"><?php echo $measure->measure_name ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Material Qty:</label>
            <input type="text" name="material_qty" class="form-control" id="unit_qty" placeholder="Material Qty" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Material Unit Price:</label>
            <input type="text" name="unit_price" class="form-control" id="unit_price" placeholder="Unit Price" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Total Amount:</label>
            <input type="text" name="total_amount" class="form-control" id="total_amount" placeholder="Total Amount" required>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputPassword1">Material Type:</label>
            <select name="material_type" class="form-control">
                <option value="" selected>Select Type</option>
                <option value="1">Contruction</option>
                <option value="2">Electric</option>
                <option value="3">Water System</option>
                <option value="4">Interial</option>
                <option value="5">Decoration</option>
            </select>
        </div>
    
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?php echo form_close() ?>
</div>

<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>

$('#unit_price').on('input', ()=>{
    var unit_price = $('#unit_price').val()
    var unit_qty = $('#unit_qty').val()
    var total_amount = unit_price*unit_qty
    console.log(total_amount)
    if(isNaN(total_amount)){
        $('#total_amount').val('Enter Number Only !') ;
    }else
    {
        $('#total_amount').val(total_amount) ;
    }
})

</script>