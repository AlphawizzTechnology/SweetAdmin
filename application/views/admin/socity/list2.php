<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/apple-icon.png"); ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/favicon.png"); ?>" />
    <title></title>
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
</head>

<body>
    <div class="wrapper">
        <?php  $this->load->view("admin/common/sidebar"); ?>
        <div class="main-panel">
            <?php  $this->load->view("admin/common/header"); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">home</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Society</h4>
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Society Name : </label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="socity_name" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Pincode / Area code / Zip : </label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="pincode" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Delivery Charge : </label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="number" name="delivery" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-rose" name="addcatg" value="Add Society">ADD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Society List</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Society Name</th>
                                                    <th>Pincode / Area code / Zip</th>
                                                    <th>Delivery Charge</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Society Name</th>
                                                    <th>Pincode / Area code / Zip</th>
                                                    <th>Delivery Charge</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php foreach($socities as $socity){ ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $socity->socity_id; ?></td>
                                                        <td><?php echo $socity->socity_name; ?></td>
                                                        <td><?php echo $socity->pincode; ?></td>
                                                        <td><?php echo $socity->delivery_charge; ?></td>
                                                        <td class="td-actions text-right"><div class="btn-group">
                                                            <?php echo anchor('admin/edit_socity/'.$socity->socity_id, '<button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                                <i class="material-icons">edit</i>
                                                            </button>', array("class"=>"")); ?>

                                                            <?php echo anchor('admin/delete_socity/'.$socity->socity_id, '<button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                                <i class="material-icons">close</i>
                                                            </button>', array("class"=>"", "onclick"=>"return confirm('Are you sure delete?')")); ?>
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                    </div>
                </div>
            </div>
            <?php  $this->load->view("admin/common/footer"); ?>
        </div>
    </div>
    <?php  $this->load->view("admin/common/fixed"); ?>
</body>
<!--   Core JS Files   -->
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
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jasny-bootstrap.min.js"); ?>"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/fullcalendar.min.js"); ?>"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.tagsinput.js"); ?>"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/material-dashboard.js"); ?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/demo.js"); ?>"></script>
</html>