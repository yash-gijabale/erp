<style>
    * {
        font-size: 20px;
    }

    div {
        border: 1px solid black;
        background-color: white;
    }

    img {
        height: 70px;
        width: 70px;

    }

    .main-div {
        padding: 20px;
        width: 100vw;
    }

    .box {
        margin: 20px 10px;
        width:100vw;
    }

    .caption {
        height: 18vh;
        display: grid;
        justify-content: center;
        align-item: center;
    }

    .p1,.p2,.p3{
        margin:5px;
        padding:0px;
        display:grid;
        justify-content:center;
    }

    p{
        align-item: center;
    }

    /* heading */
    .heading {
        display: flex;
        background-color: aqua;
        width: 100vw;
        margin: auto;
        text-align: center;
    }

    .heading-1 {
        width: 60%;
    }

    h2 {
        font-size: 30px !important;
    }

    .form-group {
        width: 20%;
    }


    /* Form-body */

    .a-box {
        display: flex;
        width: 100vw;
        height: 15vh;
    }

    .head {
        width: 10%;
    }

    .a1-child {

        height: 100%;
    }

    .a1-fchild {
        width: 60%;
    }

    .a1-schild {
        width: 30%;
    }


    .main-w-detail,
    .main-w-location,
    .main-w-order,
    .main-date {
        display: flex;
        height: 50%;
        width: 100%;
    }


    .w-detail,
    .w-location,
    .w-order,
    .date {
        width: 20%;
        font-weight:bold;
    }

    .i-w-detail,
    .i-w-location,
    .i-w-order,
    .i-date {
        width: 80%;
    }



    /* A2 */

    .main-contractor,
    .main-aeml {
        display: flex;
        width: 100%;
    }

    .contractor,
    .aeml {
        width: 40%;
        font-weight:bold;
    }

    .i-contractor,
    .i-aeml {
        width: 60%;
    }


    .a2-child {
        width: 45%
    }

    .a2-child {
        display: flex;

    }

    /* A3 */

    .a3 {
        height: 19vh;
    }

    .a3-child {
        display: flex;
        width: 100%;
    }

    .w-category,
    .outage {
        width: 50%;
        font-weight:bold;

    }


    .a3-fchild {
        width: 25%;
    }

    .a3-schild {
        width: 15%;
    }

    .a3-tchild {
        width: 50%;
    }

    .main-w-outage,
    .main-wo-outage {
        display: flex;
        width: 100%;
        height: 50%;
    }

    .w-outage,
    .wo-outage {
        width: 70%;
        font-weight:bold;
    }

    .i-w-outage,
    .i-wo-outage {
        width: 30%;
    }

    .ptw {
        display: flex;
        width: 100%;
        font-weight:bold;
    }

    .ptw-txt {
        width: 70%;
    }

    .ptw-select {
        width: 30%;

    }

    .i-ptw {
        height: 50%;
    }

    .ptw-yes {
        display: flex;
        width: 100%;
    }

    .yes-box1 {
        width: 25%;
    }

    .yes-box2 {
        width: 50%;
    }

    .yes-box3 {
        width: 25%;
        display: flex;
    }

    .main-work,
    .main-caution {
        display: flex;
        width: 100%;
        height: 50%;
    }

    .work,
    .caution {
        width: 25%;
        font-weight:bold;
    }

    .main-ptw {
        /* display: flex; */
        width: 100%;
        /* height: 50%; */
    }

    .i-ptw-no,
    .ptw-no {
        height: 50%;
    }

    .i-work,
    .i-caution {
        width: 75%;
    }


    /* A4 */

    .a4,
    .a4-head {
        height: 25vh;
    }

    .a4-child {
        width: 90%;
        height: 25vh;
    }

    .main-a4 {
        display: flex;
        height: 5vh;
        width: 100%;
    }

    .a4-comman {
        width: 25%;
        font-weight:bold;
    }

    .i-a4-comman {
        width: 75%;
    }

    /* A4 */
    .a5-child {
        width: 90%;
    }

    .main-a5 {
        width: 100%;
    }

    .hazards {
        height: 40%;
        font-weight:bold;
    }

    .i-hazards {
        height: 60%;
    }

    /* A6 */

    .a6 {
        height: 25vh;
    }

    .a6-fchild {
        width: 80%;
    }

    .a6-schild {
        width: 10%;
    }

    .txt-ppe{
        font-weight:bold;

    }

    .main-ppe {
        display: flex;
        width: 100%;
        height: 25vh;
    }

    .txt-ppe {
        width: 10%;
    }

    .img-ppe {
        width: 90%;
    }

    .main-img {
        width: 100%;
        display: flex;
    }

    .img-container {
        height: 25vh;
        width: 100%;

    }

    .img {
        height: 70%;
        display: grid;
        align-items: center;
        justify-content: center;

    }

    .txt-img {
        height: 15%;
    }

    .i-img {
        height: 15%;
    }

    .main-other {
        height: 25vh;
        width: 100%;
    }

    .other {
        height: 100%;
        font-weight:bold;
    }

    .txt-other {
        height: 20%;
    }

    .i-other {
        height: 80%;
    }

    /* Table  */
    .table1,
    tr,
    th,
    td {
        border: 1px solid black;
        width: 100vw;
    }
</style>
</head>

<body>
    <!-- <button id="print" class="print"> Print </button> -->
    <div id="main" class="main-div">
        <div class="box">
            <header>
                <div class="caption">
                    <p class="p1 text-right">
                        `Record No.13.51
                        Format No.13.51.01
                    </p>
                    <p class="p2 ">
                        220kV ………………………………………… EHV Station
                    </p>
                    <p class="p3">
                        TOOLBOX  MEETING  FORM 1
                    </p>

                </div>
            </header>

            <body>
                <div class="heading">
                    <div class="form-group col-md-3"></div>
                    <div class="heading-1">
                        <h2>DAILY TOOLBOX MEETING FORM </h2>
                    </div>
                    <div class=" form-group col-md-3"></div>
                </div>


                <div class="a-box a1">
                    <div class="head a1-head">
                        <h2>A1</h2>
                    </div>

                    <div class="a1-child a1-fchild">
                        <div class="main-w-detail">
                            <div class="w-detail">Work Details:</div>
                            <div class="i-w-detail">
                                <?php echo $fromData->work_details; ?>
                            </div>
                        </div>
                        <div class="main-w-location">
                            <div class="w-location">Work location:</div>
                            <div class="i-w-location">
                                <?php echo $fromData->work_location; ?>
                            </div>
                        </div>
                    </div>

                    <div class="a1-child a1-schild">
                        <div class="main-w-order">
                            <div class="w-order">Work Order No.</div>
                            <div class="i-w-order">
                                <?php echo $fromData->work_order_no; ?>
                            </div>
                        </div>
                        <div class="main-date">
                            <div class="date">Date:</div>
                            <div class="i-date">
                                <?php echo $fromData->date; ?>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="a-box a2">
                    <div class="head a2-head">
                        <h2>A2</h2>
                    </div>

                    <div class="a2-child a2-fchild">
                        <div class="main-contractor">
                            <div class="contractor">Name of contractor / AEML Staff / Supervisor leading the
                                Toolboxmeeting:</div>
                            <div class="i-contractor">
                                <?php echo $fromData->contractor_name; ?>
                            </div>
                        </div>
                    </div>

                    <div class="a2-child a2-schild">
                        <div class="main-aeml">
                            <div class="aeml">Name of AEML Supervisor (If appointed):</div>
                            <div class="i-aeml">
                                <?php echo $fromData->aeml_name; ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="a-box a3">
                    <div class="head a3-head">
                        <h2>A3</h2>
                    </div>

                    <div class="a3-child a3-fchild">
                        <div class="w-category">Work Category
                            (“√” या “X” या “NA”)
                        </div>

                        <div class="outage">
                            <div class="main-w-outage">
                                <div class="w-outage">With Outage:</div>
                                <div class="i-w-outage">
                                    <?php echo $fromData->outage; ?>
                                </div>
                            </div>
                            <div class="main-wo-outage">
                                <div class="wo-outage">Without Outage:</div>
                                <div class="i-wo-outage">
                                    <?php echo $fromData->outage; ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="a3-child a3-schild">
                        <div class="ptw">
                            <!-- <div class="main-ptw"> -->
                            <div class="ptw-txt">PTW Requied:</div>
                            <!-- </div> -->
                            <div class="ptw-select">
                                <div class="i-ptw">
                                    <?php echo $fromData->ptw; ?>
                                </div>
                                <div class="i-ptw">
                                    <?php echo $fromData->ptw; ?>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="a3-child a3-tchild">
                        <div class="ptw-yes">
                            <div class="yes-box1">If Yes,
                                Type of PTW :
                            </div>

                            <div class="yes-box2">
                                <div class="work-caution">
                                    <div class="main-work">
                                        <div class="work">Work:</div>
                                        <div class="i-work">
                                            <?php echo $fromData->work; ?>
                                        </div>
                                    </div>
                                    <div class="main-caution">
                                        <div class="caution">Caution:</div>
                                        <div class="i-caution">
                                            <?php echo $fromData->caution; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="yes-box3">
                                <div class="main-ptw">
                                    <div class="ptw-no">PTW No:</div>
                                    <div class="i-ptw-no">
                                        <?php echo $fromData->ptw_no; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="a-box a4">
                    <div class="head a4-head">
                        <h2>A4</h2>
                    </div>
                    <div class="a4-child">
                        <div class="main-a4 main-risk">
                            <div class="a4-comman risk">Risk Assessment discussed :</div>
                            <!-- <div class="i-a4-comman i-risk"></div> -->
                        </div>
                        <div class="main-a4 main-hira">
                            <div class="a4-comman hira">HIRA Sr. Number :</div>
                            <div class="i-a4-comman i-hira">
                                <?php echo $fromData->hira_number; ?>
                            </div>
                        </div>
                        <div class="main-a4 main-ier">
                            <div class="a4-comman ier">IER Sr Number:</div>
                            <div class="i-a4-comman i-ier">
                                <?php echo $fromData->ier_number; ?>
                            </div>
                        </div>
                        <div class="main-a4 main-details">
                            <div class="a4-comman details">Details of job explained to workers:</div>
                            <div class="i-a4-comman i-details">
                                <?php echo $fromData->job_details; ?>
                            </div>
                        </div>
                        <div class="main-a4 main-jsa">
                            <div class="a4-comman jsa">JSA Discussed:</div>
                            <div class="i-a4-comman i-jsa">
                                <?php echo $fromData->jsa; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="a-box a5">
                    <div class="head a5-head">
                        <h2>A5</h2>
                    </div>
                    <div class="a5-child">
                        <div class="main-a5 main-hazards">
                            <div class="a5-comman hazards">Special Hazards if any and precautions to be taken: </div>
                            <div class="i-a5-comman i-hazards">
                                <?php echo $fromData->hazards; ?>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="a-box a6">
                    <div class="head a6-head">
                        <h2>A6</h2>
                    </div>

                    <div class="a6-fchild">
                        <div class="main-ppe">
                            <div class="txt-ppe">PPE, s
                                (व्यक्तिगत सुरक्षा उपकरण)
                            </div>
                            <div class="img-ppe">
                                <div class="main-img">
                                    <div class="img-container">
                                        <div class="img"><img src="../uploads/ppekit_img/shoes.jpg" alt="shoes"></div>
                                        <div class="txt-img">सुरक्षा जूते</div>
                                        <div class="i-img"></div>
                                    </div>
                                    <div class="img-container">
                                        <div class="img"><img src="../uploads/ppekit_img/helmet.jpg" alt="helmet"></div>
                                        <div class="txt-img">सुरक्षा हेलमेट</div>
                                        <div class="i-img"></div>
                                    </div>
                                    <div class="img-container">
                                        <div class="img"><img src="../uploads/ppekit_img/belt.jpg" alt="belt"></div>
                                        <div class="txt-img">सुरक्षा बेल्ट</div>
                                        <div class="i-img"></div>
                                    </div>
                                    <div class="img-container">
                                        <div class="img"><img src="../uploads/ppekit_img/mask.jpg" alt="mask"></div>
                                        <div class="txt-img">सुरक्षा मास्क</div>
                                        <div class="i-img"></div>
                                    </div>
                                    <div class="img-container">
                                        <div class="img"><img src="../uploads/ppekit_img/goggle.jpg" alt="goggle"></div>
                                        <div class="txt-img">सुरक्षा चश्मे</div>
                                        <div class="i-img"></div>
                                    </div>
                                    <div class="img-container">
                                        <div class="img"><img src="../uploads/ppekit_img/gloves.jpg" alt="gloves"></div>
                                        <div class="txt-img">सुरक्षा ग्लोव्ज</div>
                                        <div class="i-img"></div>
                                    </div>
                                    <div class="img-container">
                                        <div class="img"><img src="../uploads/ppekit_img/gumboot.jpg" alt="gumboot">
                                        </div>
                                        <div class="txt-img">गमबूट</div>
                                        <div class="i-img"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="a6-schild">
                        <div class="main-other">
                            <div class="other">
                                <div class="txt-other">Other PPE</div>
                                <div class="i-other">
                                    <?php echo $fromData->other_ppe; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="a-box a1">
                    <div class="head a1-head">
                        <h2></h2>
                    </div>
                </div>
                <table class="table1">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Signature</th>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                    </tr>



                </table>




            </body>
        </div>


        <script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>

            $(function () {
                $("#main").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["excel", "pdf", "print"]
                }).buttons().container().appendTo('#main_wrapper .col-md-6:eq(0)');
            });




            //  $(document).ready(function () {
            //     $('#print').click(function () {
            //         var content = $('#main').html();
            //         var myWindow = window.open('', '', 'width=800,height=600');
            //         myWindow.document.write('<html><head><title>Print</title></head><body>');
            //         myWindow.document.write(content);
            //         myWindow.document.write('</body></html>');
            //         myWindow.document.close();
            //         myWindow.print();
            //     });
            // });
        </script>