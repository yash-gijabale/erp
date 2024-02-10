<style>
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
        width: 50%
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
    }

    .i-w-outage,
    .i-wo-outage {
        width: 30%;
    }

    .ptw {
        display: flex;
        width: 100%;
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
    <button id="print" class="print"> Print </button>
    <div id="main" class="main-div">
        <div class="box">
            <header>
                <div>
                    `Record No.13.51
                    Format No.13.51.01
                    220kV ………………………………………… EHV Station`

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
                            <div class="i-w-detail"></div>
                        </div>
                        <div class="main-w-location">
                            <div class="w-location">work location:</div>
                            <div class="i-w-location"></div>
                        </div>
                    </div>

                    <div class="a1-child a1-schild">
                        <div class="main-w-order">
                            <div class="w-order">Work Order No.</div>
                            <div class="i-w-order"></div>
                        </div>
                        <div class="main-date">
                            <div class="date">Date:</div>
                            <div class="i-date"></div>
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
                                Toolboxmeeting</div>
                            <div class="i-contractor"></div>
                        </div>
                    </div>

                    <div class="a2-child a2-schild">
                        <div class="main-aeml">
                            <div class="aeml">Name of AEML Supervisor (If appointed)</div>
                            <div class="i-aeml"></div>
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
                                <div class="i-w-outage"></div>
                            </div>
                            <div class="main-wo-outage">
                                <div class="wo-outage">Without Outage:</div>
                                <div class="i-wo-outage"></div>
                            </div>

                        </div>
                    </div>

                    <div class="a3-child a3-schild">
                        <div class="ptw">
                            <!-- <div class="main-ptw"> -->
                            <div class="ptw-txt">PTW Requied:</div>
                            <!-- </div> -->
                            <div class="ptw-select">
                                <div class="i-ptw"></div>
                                <div class="i-ptw"></div>
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
                                        <div class="i-work"></div>
                                    </div>
                                    <div class="main-caution">
                                        <div class="caution">Caution:</div>
                                        <div class="i-caution"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="yes-box3">
                                <div class="main-ptw">
                                    <div class="ptw-no">PTW No:</div>
                                    <div class="i-ptw-no"></div>
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
                            <div class="a4-comman risk">Risk Assessment discussed</div>
                            <div class="i-a4-comman i-risk"></div>
                        </div>
                        <div class="main-a4 main-hira">
                            <div class="a4-comman hira">HIRA Sr. Number :</div>
                            <div class="i-a4-comman i-hira"></div>
                        </div>
                        <div class="main-a4 main-ier">
                            <div class="a4-comman ier">IER Sr Number:</div>
                            <div class="i-a4-comman i-ier"></div>
                        </div>
                        <div class="main-a4 main-details">
                            <div class="a4-comman details">Details of job explained to workers:</div>
                            <div class="i-a4-comman i-details"></div>
                        </div>
                        <div class="main-a4 main-jsa">
                            <div class="a4-comman jsa">JSA Discussed:</div>
                            <div class="i-a4-comman i-jsa"></div>
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
                            <div class="i-a5-comman i-hazards"></div>
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
                                <div class="i-other"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="a-box a1">
                    <div class="head a1-head">
                        <h2>A1</h2>
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