<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Manage Registration</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url('assets/img/favicon.png') ?>" rel="icon">
    <link href="<?php echo base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href=<?php echo base_url('assets/vendor/aos/aos.css') ?> rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/vendor/jquery-ui/jquery-ui.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/DataTables/datatables.min.css') ?>" rel="stylesheet">
    <style>
        #header {
            background: rgba(6, 12, 34, 0.98);
            height: 70px;
        }
    </style>
</head>

<body>
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">

    <div id="dialog-message" title="Track Deleted"></div>
    <?php
    echo view('web/innerpages/header.php');
    ?>

    <main id="main" class="main-page">
        <?php
        if (is_chair($conference->id, session()->user_id) == 0) { ?>

            <div class="container custom-error">

                <label class="alert fw-bold"> You are not chair!, Login with your chair ID.</label>

            </div>
        <?php } else {    ?>

            <?php
            echo view('web/innerpages/conference_header');
            ?>
            <section>


                <div class="container">

                    <div class="section-header">
                        <h2>Manage Registration</h2>
                    </div>

                    <div class="block p-3">

                    </div>

                    <!---->
                    <div class="row">
                        <div class="col-6">
                            <h5>Registration for <span style="border-bottom:2px solid #09F; color:#F60;"><?php echo $conference->acronym . ": " . $conference->title ?></span></h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="<?php echo base_url('Registration/addCustomRegistration/' . $conference->id) ?>" class="btn btn-link">Add Custom Registration</a><br>
                            <a href="<?php echo base_url('Registration/addRegistration/' . $conference->id) ?>" class="btn btn-link">Add Registration</a><br>
                            <button class="btn  btn-link" id="registrationStart" value="<?php echo $conference->id ?>"> Registration Start/Stop</button><br>
                            <!--                    <a href="--><?php //echo base_url('Registration/ManageCategory/'.$conference->id) 
                                                                ?><!--"  >  Manage Category</a><br>-->
                            <button class="btn btn-link" id="exportss" value="<?php echo $conference->id ?>">Export</button><br>
                            <button class="btn btn-link" id="zipbtn" value="<?php echo $conference->id ?>">Zip</button><br>

                        </div>
                    </div>

                    <?php
                    //            echo "<pre>";
                    //            var_dump($paymentDetailsAll);
                    //            echo "</pre>";
                    //            exit;
                    if (count($paymentDetailsAll) > 0) {   ?>
                        <div class="table-responsive mt-3 mb-5">
                            <table class="table" id="example1">
                                <thead>
                                    <tr>
                                        <td>#Invoice</td>
                                        <td>Conference</td>
                                        <td>Name</td>
                                        <td>Membership ID</td>
                                        <td>Address</td>
                                        <td>State</td>
                                        <td>Email</td>
                                        <td>Affiliation</td>
                                        <td>Phone</td>
                                        <td>Paper ID</td>
                                        <td>Paper Title</td>
                                        <td>Nationality</td>
                                        <td>Category</td>
                                        <td>Currency</td>
                                        <td>Transaction ID</td>
                                        <td>Registration Fee</td>
                                        <td>Extra Page Charges</td>
                                        <td>GST</td>
                                        <td>Net Payment</td>
                                        <td>Payment Amount</td>
                                        <td>Payment Status</td>
                                        <td>Date Time</td>
                                        <td>Action</td>

                                    </tr>
                                </thead>
                                <!--                <tbody>-->
                                <!--                --><?php
                                                        //                foreach ($paymentDetailsAll as $res )
                                                        //                {
                                                        //                
                                                        ?>
                                <!--                <tr>-->
                                <!--                    <td><a href="--><?php //echo base_url().'/Registration/pdf/'.$res->id 
                                                                        ?><!--">--><?php //echo $res->invoice_no; 
                                                                                                                                            ?><!--</a></td>-->
                                <!--                    <td>--><?php //echo $conference->acronym; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->name; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->membership_id; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->address; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->email; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->code." ".$res->contact; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->paperid; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->papertitle; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->nationality; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->cat_name; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->currency; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->transaction_id; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->registration_fee; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->extrapage_charges; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->gst; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->net_payment; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->payment_amount; 
                                                                ?><!--</td>-->
                                <!--                    <td>--><?php //echo $res->payment_status; 
                                                                ?><!--</td>-->
                                <!---->
                                <!---->
                                <!--                </tr>-->
                                <!--                --><?php //}
                                                        //                
                                                        ?>
                                <!--                </tbody>-->
                            </table>
                        </div>

                    <?php } else {
                        echo "No Records found!";
                    } ?>

                </div>
            </section>
        <?php } ?>
    </main>

    <!--    Edit track-->
    <div class="modal fade" id="trackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Registration Start/Stop </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="trackEditForm" enctype="multipart/form-data">
                        <input type="hidden" name="conference_id" id="conference_id" value="<?php echo $conference->id ?>">
                        <div class="row">



                            <div class="form-group col-md-6">
                                <label>Start Date<span class="text-danger">*</span></label>
                                <input name="startdate" type="text" class="form-control jq_title datepicker" id="startdate" data-required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label>End Date<span class="text-danger">*</span></label>
                                <input name="enddate" type="text" class="form-control jq_title datepicker" id="enddate" data-required="true">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status<span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control" data-required="true">
                                    <option value="">select status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>

                            </div>





                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary jq_save editsubmit" id="editsubmit">Save changes</button>
                    <span class="jq_wait" style="display:none;"><i class="fa fa-spin fa-spinner"></i> Please wait...</span>
                    <div class="success_message"></div>
                </div>
            </div>
        </div>
    </div>

    <!--    Edit track-->
    <div class="modal fade" id="exportsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export Data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="exportForm" action=" <?php echo base_url() ?>/Registration/excel" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="conference_id" id="export_conference_id" value="<?php echo $conference->id ?>">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label>Export<span class="text-danger">*</span></label>
                                <select name="exportstatus" id="exportstatus" class="form-control" required>
                                    <option value="">select status</option>
                                    <option value="success">Success</option>
                                    <option value="failure">Failure</option>
                                    <option value="All">All</option>
                                </select>

                            </div>

                        </div>
                        <div class="row mt-3">

                            <div class="form-group col-md-12 text-end">
                                <button type="submit" class="btn btn-primary jq_save exportsubmit" id="exportsubmit">Export </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <!--    Zip Model-->
    <div class="modal fade" id="zipModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Invoice Zip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Registration/invoiceZip') ?>" method="post" enctype="multipart/form-data" target="_blank">
                        <input type="hidden" name="conference_id" id="conference_id" value="<?php echo $conference->id ?>">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label>Start Date<span class="text-danger">*</span></label>
                                <input name="monthyear" type="text" id="monthyear" class="form-control jq_title" data-required="true" autocomplete="off">
                            </div>

                            <!--                        <div class="form-group col-md-12">-->
                            <!--                            <label>Status<span class="text-danger">*</span></label>-->
                            <!--                            <select name="status" id="status" class="form-control" data-required="true">-->
                            <!--                                <option value="">select status</option>-->
                            <!--                                <option value="1">Active</option>-->
                            <!--                                <option value="0">Inactive</option>-->
                            <!--                            </select>-->
                            <!---->
                            <!--                        </div>-->
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success">Download Invoice</button>
                            </div>

                        </div>
                    </form>
                </div>
                <!--            <div class="modal-footer">-->
                <!---->
                <!--                <button type="submit" class="btn btn-primary jq_save editsubmit" id="invoicedonwload">Save changes</button>-->
                <!--                <span class="jq_wait" style="display:none;"><i class="fa fa-spin fa-spinner"></i> Please wait...</span>-->
                <!--                <div class="success_message"></div>-->
                <!--            </div>-->
            </div>
        </div>
    </div>


    <?php
    echo view('web/innerpages/footer.php');
    ?>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets/vendor/aos/aos.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src=" echo base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/DataTables/datatables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/DataTables/datatables.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/vendor/DataTables/JSZip/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/DataTables/Buttons-2.1.1/js/buttons.dataTables.min.js') ?>"></script>
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>-->
</body>

<script language="javascript" type="text/javascript">
    var base_url = $('#base_url').val();
    // alert(base_url);
    $(function() {
        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });

    //data table

    // $('#example1').DataTable();
    $(document).ready(function() {

        var conference_id = $('#registrationStart').val();

        var dataTable = $('#example1').DataTable({
            "search": {
                "search": "success"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": base_url + "/Registration/registratinoDataAjax",
                type: "post",
                data: {
                    conference_id: conference_id
                },
            },
            // select: true,
            // dom: 'Blfrtip',
            lengthMenu: [
                [10, 25, 50, 100, 500],
                [10, 25, 50, 100, 500]
            ],
            // buttons: [
            //     {extend: 'excel', text: ' Export'},
            // ]
        });
        // table.buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).on('click', '.sendInvoice', function() {
        var id = $(this).val();
        alert('Mail has been sent');
    });



    $(document).on('click', '.RegDel', function() {

        // }))
        // $('.RegDel').click(function (){
        var id = $(this).val();
        ConfirmDialog('Are you sure to delete this registration details?');

        function ConfirmDialog(message) {
            $('<div></div>').appendTo('body')
                .html('<div><h6>' + message + '?</h6></div>')
                .dialog({
                    modal: true,
                    title: 'Confirm',
                    zIndex: 10000,
                    autoOpen: true,
                    width: 'auto',
                    resizable: false,
                    buttons: {
                        Yes: function() {

                            var action = base_url + "/Registration/Regdel";
                            var method = 'POST';
                            $.ajax({
                                url: action,
                                type: method,
                                data: {
                                    id: id
                                },
                                cache: false,
                                // contentType: false,
                                // processData: false,
                                'beforeSend': function() {
                                    // $(".jq_wait").show();
                                    // $(".jq_save").hide();
                                },
                                success: function(data) {
                                    console.log(data); //return false;
                                    var obj = JSON.parse(data);
                                    if (obj.type == 'success') {
                                        // $(".jq_wait").hide();
                                        // $(".jq_save").show();

                                        $("#dialog-message").html('<div class="alert-success bottom-margin"><i class="fa fa-check"></i> ' + obj.msg + '</div>').show('blind');
                                        $("#dialog-message").dialog({
                                            modal: true,
                                            buttons: {
                                                Ok: function() {
                                                    $(this).dialog("close");
                                                }
                                            }
                                        });
                                        setTimeout(function() {
                                            location.reload();
                                        }, 2000);

                                    } else {
                                        // $(".jq_wait").hide();
                                        // $(".jq_save").hide();
                                        $(".dialog-message").html('<div class="alert alert-success alert-dismissable bottom-margin"><i class="fa fa-check"></i> ' + obj.msg + '</div>').show('blind');
                                        $("#dialog-message").dialog({
                                            modal: true,
                                            buttons: {
                                                Ok: function() {
                                                    $(this).dialog("close");
                                                }
                                            }
                                        });
                                    }
                                }
                            })
                            $(this).dialog("close");

                        },
                        No: function() {
                            // $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');
                            // $(".jq_wait").hide();
                            // $(".jq_save").show();
                            $(this).dialog("close");
                        }
                    },
                    close: function(event, ui) {
                        $(this).remove();
                    }
                });
        };

    });
</script>

<script>
    $('#registrationStart').click(function(e) {
        e.preventDefault();

        var conference_id = $('#registrationStart').val();
        var trackModal = new bootstrap.Modal(document.getElementById('trackModal'), {
            keyboard: true,
            focus: true
        });


        var action = base_url + "/Registration/status";
        var method = 'POST';
        $.ajax({
            url: action,
            type: method,
            data: {
                conference_id: conference_id
            },
            success: function(data) {
                console.log(data); //return false;
                var obj = JSON.parse(data);
                // var newstartdate = obj.start_date.split("-").reverse().join("-");
                // console.log(newstartdate);
                if (obj.registration_start != null) {
                    $('#status').val(obj.registration_status);
                    $('#startdate').val(obj.registration_start.split("-").reverse().join("-"));
                    $('#enddate').val(obj.registration_end.split("-").reverse().join("-"));
                }


                trackModal.show();
            }
        })


    });
</script>

<script>
    $('#exportss').click(function() {

        var exportsModal = new bootstrap.Modal(document.getElementById('exportsModal'), {
            keyboard: true,
            focus: true
        });
        exportsModal.show();
    });
    $('#zipbtn').click(function() {

        var exportsModal = new bootstrap.Modal(document.getElementById('zipModal'), {
            keyboard: true,
            focus: true
        });
        exportsModal.show();
    });
</script>
<script>
    // track edit
    $(document).on('click', '#editsubmit', function(e) {
        e.preventDefault();
        var error = false;
        //simple input validation
        $($('#trackEditForm').find("input[data-required=true], select[data-required=true], textarea[data-required=true]")).each(function() {
            if (!$.trim($(this).val())) { //if this field is empty
                $(this).css('border-color', 'red'); //change border color to red
                $(this).focus();
                error = true;
                return false;
            }

        }).on("input", function() { //change border color to original
            $(this).css('border-color', '');
        });

        if (error) {
            return false;
        } else {
            var data = new FormData($('#trackEditForm')[0]);
            var action = base_url + "/Registration/statusUpdate";
            var method = 'POST';
            $.ajax({
                url: action,
                type: method,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                'beforeSend': function() {
                    $(".jq_wait").show();
                    $(".jq_save").hide();
                },
                'error': function() {
                    $(".jq_wait").hide();
                    $(".jq_save").hide();
                },
                success: function(data) {
                    console.log(data); // return false;
                    var obj = JSON.parse(data);
                    if (obj.type == 'success') {
                        $(".jq_wait").hide();
                        $(".jq_save").show();
                        $('#trackEditForm')[0].reset();
                        $(".success_message").html('<div class="alert-success bottom-margin"><i class="fa fa-check"></i> ' + obj.msg + '</div>').show('blind');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);

                    } else {
                        // alert(obj.msg);
                        $(".jq_wait").hide();
                        $(".jq_save").hide();
                        $(".success_message").html('<div class="alert alert-success alert-dismissable bottom-margin"><i class="fa fa-check"></i> ' + obj.msg + '</div>').show('blind');
                    }
                }
            })
        }
    });
</script>


This code is working flawlessly to me:

<script type="text/javascript">
    $(document).ready(function() {
        $("#monthyear").datepicker({
            dateFormat: 'MM yy',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,

            onClose: function(dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
            }
        });

        $("#monthyear").focus(function() {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });
    });
</script>

<style>
    .hide {
        display: none;
    }
</style>

</html>