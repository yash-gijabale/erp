<style>
    img {
        height: 50px;
        width: 50px;
    }
</style>




<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Daily Toolbox Meeting Form</h3>
    </div>
    <?php if(isset($submit_status)){ 
        if($submit_status){ ?>
    <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
        <?php echo $submit_msg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php }else{ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $submit_msg;?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } } ?>
    <?php echo form_open('daily-toolbox') ?>
    <div class="card-body row">
        <div class="form-group col-md-10">
            <label for="exampleInputPassword1">Work Details:</label>
            <input type="text" name="work_details" class="form-control" id="exampleInputPassword1"
                placeholder="Work Details" required>
        </div>
        <div class="form-group col-md-2">
            <label for="exampleInputPassword1">Work Order No.:</label>
            <input type="text" name="work_order_no" class="form-control" id="exampleInputPassword1"
                placeholder="Work Order No." required>
        </div>
        <div class="form-group col-md-10">
            <label for="exampleInputPassword1">Work Location:</label>
            <input type="text" name="work_location" class="form-control" id="exampleInputPassword1"
                placeholder="Work Location" required>
        </div>
        <div class="form-group col-md-2">
            <label for="exampleInputPassword1">Date</label>
            <input type="date" name="date" class="form-control" id="exampleInputPassword1">
        </div>
        <hr class="hr hr-blurry" />
        <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Name of contractor / AEML Staff / Supervisor leading the Toolbox
                meeting:</label>
            <input type="text" name="contractor_name" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Name of AEML Supervisor(If appointed):</label>
            <input type="text" name="aeml_name" class="form-control" id="exampleInputPassword1">
        </div>
        <hr>

        <div class="cal-md-12 row">
            <div class="form-group col-md-3">
                <label for="exampleInputPassword1">Work Category:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="outage" value="1" id="">
                    <label class="form-check-label" for="flexRadioDefault1">With Outage</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="outage" value="0" id="" checked>
                    <label class="form-check-label" for="flexRadioDefault2"> Without Outage</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputPassword1">PTW Required:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ptw" value="1" id="wcategory1">
                    <label class="form-check-label" for="flexRadioDefault1">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ptw" value="0" id="wcategory0" checked>
                    <label class="form-check-label" for="flexRadioDefault2">No</label>
                </div>

            </div>

            <div class="form-group col-md-6 d-none" id="ptwcheck">If Yes,Type of PTW
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Work:</label>
                    <input type="text" name="work" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Caution:</label>
                    <input type="text" name="caution" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">PTW No.:</label>
                    <input type="text" name="ptw_no" class="form-control" id="exampleInputPassword1">
                </div>
            </div>
        </div>



        <hr>
        <label for="exampleInputPassword1">Risk Assessment Discussed</label>
        <div class="form-group col-md-6">
            <div class="form-group col-md-4">
                <label for="exampleInputPassword1">HIRA Sr.Number:</label>
                <input type="text" name="hira_number" class="form-control" id="exampleInputPassword1"
                    placeholder="HIRA Sr.Number">
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group col-md-4">
                <label for="exampleInputPassword1">IER Sr.Number:</label>
                <input type="text" name="ier_number" class="form-control" id="exampleInputPassword1"
                    placeholder="IER Sr.Number">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Details of job explained to workers:</label>
            <input type="text" name="job_details" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputPassword1">JSA Discssed:</label>
            <input type="text" name="jsa" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Special Hazards If any and precautions to be taken:</label>
            <textarea class="form-control" name="hazards"></textarea>
        </div>
        <hr>
        <div>
            <div class="row form-group">
                <label for="exampleInputPassword1">PPE's (व्यक्तिगत सुरक्षा उपकरण):</label>
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" value="shoes" id="flexCheckDefault">
                    <img src="../uploads/ppekit_img/shoes.jpg" alt="shoes">
                    <label class="form-check-label" for="flexCheckDefault">
                        सुरक्षा जूते
                    </label>
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input " type="checkbox" value="helmet" id="flexCheckDefault">
                    <img src="../uploads/ppekit_img/helmet.jpg" alt="">
                    <label class="form-check-label" for="flexCheckDefault">
                        सुरक्षा हेलमेट
                    </label>
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" value="belt" id="flexCheckDefault">
                    <img src="../uploads/ppekit_img/belt.jpg" alt="">
                    <label class="form-check-label" for="flexCheckDefault">
                        सुरक्षा बेल्ट
                    </label>
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" value="mask" id="flexCheckDefault">
                    <img src="../uploads/ppekit_img/mask.jpg" alt="">
                    <label class="form-check-label" for="flexCheckDefault">
                        सुरक्षा मास्क
                    </label>
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" value="goggle" id="flexCheckDefault">
                    <img src="../uploads/ppekit_img/goggle.jpg" alt="">
                    <label class="form-check-label" for="flexCheckDefault">
                        सुरक्षा चश्मे
                    </label>
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" value="gloves" id="flexCheckDefault">
                    <img src="../uploads/ppekit_img/gloves.jpg" alt="">
                    <label class="form-check-label" for="flexCheckDefault">
                        सुरक्षा ग्लोव्ज
                    </label>
                </div>
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" value="gumboot" id="flexCheckDefault">
                    <img src="../uploads/ppekit_img/gumboot.jpg" alt="">
                    <label class="form-check-label" for="flexCheckDefault">
                        गमबूट
                    </label>
                </div>



            </div>


        </div>

        <table id="table1" class="table table-bordered">
            <thead>
                <tr>
                    <th>SR No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Signature</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php $sr_no = 1; ?>
                <tr>
                    <td>
                        <?php echo $sr_no ?>
                    </td>
                    <td>
                        <input type="text" name="name[]" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="signature[]" class="form-control" required>
                    </td>
                </tr>
                <?php $sr_no++; ?>
            </tbody>
        </table>
        <div class="row d-flex justify-content-end">
            <button type="button" id="add_row" class="btn btn-warning btn-sm p-0 col-md-1">+</button>
            <!-- <button type="button" id="remove_row" class="btn btn-warning btn-sm p-0 col-md-1" onclick="removerow()">-</button> -->
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <?php echo form_close() ?>
    </div>



    <script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>

        var count = 2;
         $('#add_row').on('click', function () {
             $('table').find('tbody').append( `<tr>
                                 <td>${count}</td>
                                 <td><input type="text" class="form-control" name="name[]" /></td>
                                 <td><input type="text" class="form-control" name="signature[]" /></td>
                               </tr>`);
                 count++
             });



        // $(function () {
            //     $("#table1").DataTable({
                //         "responsive": true, "lengthChange": false, "autoWidth": true, "ordering": false,
                //         "buttons": ["excel", "pdf", "print"]
        //     }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
        // });


        $("#wcategory1").click(function () {
            $("#ptwcheck").addClass("d-inline");
            $("#ptwcheck").removeClass("d-none");
        });
        $("#wcategory0").click(function () {
            $("#ptwcheck").addClass("d-none");
            $("#ptwcheck").removeClass("d-inline");
        });


        // function removerow() {
        //     $("#remove_row").click(function () {
        //         var rowCount = $("tr").length;
        //         if (rowCount > 1) {
        //             $("#table-body tr:last").remove();
        //         }
        //     });
        // }




    </script>