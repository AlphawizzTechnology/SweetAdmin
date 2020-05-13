<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/apple-icon.png"); ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/favicon.png"); ?>" />
    <title>Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url($this->config->item("new_theme")."/assets/css/bootstrap.min.css"); ?>" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url($this->config->item("new_theme")."/assets/css/material-dashboard.css"); ?>" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url($this->config->item("new_theme")."/assets/css/demo.css"); ?>" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url($this->config->item("new_theme")."/assets/css/font-awesome.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url($this->config->item("new_theme")."/assets/css/google-roboto-300-700.css"); ?>" rel="stylesheet" />
    <style type="text/css">
        .ui-datepicker-trigger{
            height: 25px !important;
            width: 25px !important
        }
        #ui-datepicker-div{
            background-color: #fff;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <?php  $this->load->view("admin/common/sidebar"); ?>
        <div class="main-panel">
            <?php  $this->load->view("admin/common/header"); ?>
            <div class="content">
                <div class="container-fluid">
                    <?php  if(isset($error)){ echo $error; }
                        echo $this->session->flashdata('message'); 
                    ?>
                    <div class="row">
                        <form form action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">contacts</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">EDIT OFFER</h4>
                                        <div class="row">
                                            <?php echo form_error('coupon_title'); ?>
                                            <label class="col-md-3 label-on-left">Name of The Offer : *</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="offer_name" class="form-control" value="<?= $offer['offer_name']; ?>" placeholder="coupon_title" />
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php echo form_error('coupon_code'); ?>
                                            <label class="col-md-3 label-on-left">User Id: *</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="user_id" class="form-control" value="<?= $offer['user_id']; ?>" placeholder="couponcode" />
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        

                                        <div class="row">
                                            <?php echo form_error('coupon_code'); ?>
                                            <label class="col-md-3 label-on-left">product Id: *</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="product_id" class="form-control" value="<?= $offer['product_id']; ?>" placeholder="couponcode" />
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Validity : *</label>
                                            <div class="col-md-4">
                                                <?php echo form_error('from'); ?>
                                                <div class="card">
                                                    <div class="card-header card-header-icon" data-background-color="rose">
                                                        <i class="material-icons">today</i>
                                                    </div>
                                                    <div class="card-content">
                                                        <h4 class="card-title">Date From</h4>
                                                        <div class="form-group">
                                                            <label class="label-control"></label>
                                                            <input type='text' id='txtDate' name="from" class="form-control datetimepicker" " value="<?= $offer['from']; ?>" readonly="">
                                                        <span class="material-input"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo form_error('to'); ?>
                                                <div class="card">
                                                    <div class="card-header card-header-icon" data-background-color="rose">
                                                        <i class="material-icons">library_books</i>
                                                    </div>
                                                    <div class="card-content">
                                                        <h4 class="card-title">Date To</h4>
                                                        <div class="form-group">
                                                            <label class="label-control"></label>
                                                            <input type='text' id="txtDate2" name="to" class="form-control datepicker" value="<?= $offer['to']; ?>" readonly="">
                                                        <span class="material-input"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php echo form_error('value'); ?>
                                            <label class="col-md-3 label-on-left">Discount : *</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="discount" value="<?= $offer['discount'];?>" placeholder="00.00" class="form-control" />
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <input type="submit"name="addcatg" value="Edit Coupon" class="btn btn-fill btn-rose" />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php  $this->load->view("admin/common/footer"); ?>
        </div>
    </div>
    <?php  $this->load->view("admin/common/fixed"); ?>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url($this->config->item('new_theme')); ?>/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     
        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                ckeditor.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery-ui.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/material.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/perfect-scrollbar.jquery.min.js"); ?>" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.validate.min.js"); ?>"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/moment.min.js"); ?>"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/chartist.min.js"); ?>"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.bootstrap-wizard.js"); ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/bootstrap-notify.js"); ?>"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.sharrre.js"); ?>"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/bootstrap-datetimepicker.js"); ?>"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery-jvectormap.js"); ?>"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/nouislider.min.js"); ?>"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.select-bootstrap.js"); ?>"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.datatables.js"); ?>"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/sweetalert2.js"); ?>"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jasny-bootstrap.min.js"); ?>"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/fullcalendar.min.js"); ?>"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.tagsinput.js"); ?>"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/material-dashboard.js"); ?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/demo.js"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });

    $(document).ready(function() {

    $("#txtDate").datepicker({
        showOn: 'button',
        buttonText: 'Show Date',
        buttonImageOnly: true,
        buttonImage: 'http://jqueryui.com/resources/demos/datepicker/images/calendar.gif',
        dateFormat: 'dd/mm/yy',
        constrainInput: true
    });

    $(".ui-datepicker-trigger").mouseover(function() {
        $(this).css('cursor', 'pointer');
    });

});

    $(document).ready(function() {

    $("#txtDate2").datepicker({
        showOn: 'button',
        buttonText: 'Show Date',
        buttonImageOnly: true,
        buttonImage: 'http://jqueryui.com/resources/demos/datepicker/images/calendar.gif',
        dateFormat: 'dd/mm/yy',
        constrainInput: true
    });

    $(".ui-datepicker-trigger").mouseover(function() {
        $(this).css('cursor', 'pointer');
    });

});
</script>
</html>