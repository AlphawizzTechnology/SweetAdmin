<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/apple-icon.png"); ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/favicon.png"); ?>" />
    <title></title>
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
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
        <!-- side -->
        <?php  $this->load->view("admin/common/sidebar"); ?>
        <div class="main-panel">
            <!-- head-->
            <?php  $this->load->view("admin/common/header"); ?>
            <!-- content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Daily orders</p>
                                    <?php 
                                        $date=date("Y-m-d");
                                        $a = $this->db->query("SELECT * FROM sale WHERE status=4 AND on_date='".$date."'"); 
                                        
                                    ?>
                                    <h3 class="card-title"><?php echo $a->num_rows(); ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <?php 
                                        $b = $this->db->query("SELECT * FROM sale WHERE status=4"); ?>
                                        <i class="material-icons">weekend</i>Total Order Till Date<span style="margin-right:0px !important">&emsp;&emsp;&emsp;&emsp;<?php echo $b->num_rows(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Active Users</p>
                                    <?php 
                                        $c = $this->db->query("SELECT * FROM registers"); ?>
                                    <h3 class="card-title"><?php echo $c->num_rows(); ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">group</i> Tracked from Database Analytics
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">money</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Today Revenue</p>
                                    <?php 
                                        $d = $this->db->query("SELECT SUM(total_amount) as total FROM sale WHERE status=4 AND on_date='".$date."'");
                                        $row=$d->row_array();?>
                                    <h3 class="card-title"><?php if(empty($row['total'])){ echo 0;} else{echo $row['total'];} ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <?php 
                                        $e = $this->db->query("SELECT SUM(total_amount) as total FROM sale WHERE status=4"); 
                                        $row= $e->row_array();?>
                                        <i class="material-icons">money</i>Total Revenue Till Date<span style="margin-right:0px !important">&emsp;&emsp;<?php echo $row['total'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">star</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Today Reward</p>
                                    <?php 
                                        $f = $this->db->query("SELECT SUM(total_rewards) as total FROM sale WHERE status=4 AND on_date='".$date."'");
                                        $row=$f->row_array();?>
                                    <h3 class="card-title"><?php if(empty($row['total'])){ echo 0;} else{echo $row['total'];} ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <?php 
                                        $g = $this->db->query("SELECT SUM(total_rewards) as total FROM sale WHERE status=4"); 
                                        $row= $g->row_array();?>
                                        <i class="material-icons">star</i>Total Revenue Till Date<span style="margin-right:0px !important">&emsp;&emsp;&emsp;<?php echo $row['total'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Today Orders :</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Order</th>
                                                    <th class="text-center">Customer Name</th>
                                                    <th class="text-center">Socity</th>
                                                    <th class="text-center">Customer Phone</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Time</th>
                                                    <th class="text-center">Order Amount</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">Order</th>
                                                    <th class="text-center">Customer Name</th>
                                                    <th class="text-center">Socity</th>
                                                    <th class="text-center">Customer Phone</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Time</th>
                                                    <th class="text-center">Order Amount</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php foreach($today_orders as $order ){ ?>
                                                <tr>
                                                    <th class="text-center"><?php echo $order->sale_id; ?></th>
                                                    <?php if(!empty($order->First_name) && !empty($order->Last_name)){  ?>
                                                    <th class="text-center"><?php echo $order->First_name.' '.$order->Last_name; ?></th>
                                                    <?php  } else { ?>
                                                    <th class="text-center"><?= $order->user_fullname ?></th>
                                                    <?php } ?>
                                                    <th class="text-center"><?php echo $order->socity_name; ?></th>
                                                    <th class="text-center"><?php echo $order->user_phone; ?></th>
                                                    <th class="text-center"><?php echo $order->on_date; ?></th>
                                                    <th class="text-center"><?php echo date("H:i A", strtotime($order->delivery_time_from))." - ".date("H:i A", strtotime($order->delivery_time_to)); ?></th>
                                                    <th class="text-center"><?php echo $order->total_amount; ?></th>
                                                    <th class="text-center">
                                                        <?php if($order->status == 0){
                                                            echo "<span class='label label-default'>Pending</span>";
                                                        }else if($order->status == 1){
                                                            echo "<span class='label label-success'>Confirm</span>";
                                                        }else if($order->status == 2){
                                                            echo "<span class='label label-info'>Delivered</span>";
                                                        }else if($order->status == 3){
                                                            echo "<span class='label label-danger'>cancel</span>";
                                                        }  ?>
                                                    </th>

                                                    <td class="td-actions text-center"><div class="btn-group">
                                                            <?php echo anchor('admin/orderdetails/'.$order->sale_id, '<button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                            <i class="material-icons">assignment</i>
                                                        </button>', array("class"=>"")); ?>
                                                            
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
                        <!-- end col-md-12 -->
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Next Day Orders :</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Order</th>
                                                    <th class="text-center">Customer Name</th>
                                                    <th class="text-center">Socity</th>
                                                    <th class="text-center">Customer Phone</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Time</th>
                                                    <th class="text-center">Order Amount</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">Order</th>
                                                    <th class="text-center">Customer Name</th>
                                                    <th class="text-center">Socity</th>
                                                    <th class="text-center">Customer Phone</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Time</th>
                                                    <th class="text-center">Order Amount</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php foreach($nextday_orders as $order){ ?>
                                                <tr>
                                                    <th class="text-center"><?php echo $order->sale_id; ?></th>
                                                    <th class="text-center"><?php echo $order->user_fullname; ?></th>
                                                    <th class="text-center"><?php echo $order->socity_name; ?></th>
                                                    <th class="text-center"><?php echo $order->user_phone; ?></th>
                                                    <th class="text-center"><?php echo $order->on_date; ?></th>
                                                    <th class="text-center"><?php echo date("H:i A", strtotime($order->delivery_time_from))." - ".date("H:i A", strtotime($order->delivery_time_to)); ?></th>
                                                    <th class="text-center"><?php echo $order->total_amount; ?></th>
                                                    <th class="text-center">
                                                        <?php if($order->status == 0){
                                                            echo "<span class='label label-default'>Pending</span>";
                                                        }else if($order->status == 1){
                                                            echo "<span class='label label-success'>Confirm</span>";
                                                        }else if($order->status == 2){
                                                            echo "<span class='label label-info'>Delivered</span>";
                                                        }else if($order->status == 3){
                                                            echo "<span class='label label-danger'>cancel</span>";
                                                        }  ?>
                                                    </th>

                                                    <td class="td-actions text-center"><div class="btn-group">
                                                            <?php echo anchor('admin/orderdetails/'.$order->sale_id, '<button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                            <i class="material-icons">assignment</i>
                                                        </button>', array("class"=>"")); ?>
                                                            
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
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
            <!-- Foot -->
            <?php  $this->load->view("admin/common/footer") ?>
        </div>
    </div>
    <!-- content -->
    <?php  $this->load->view("admin/common/fixed"); ?>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery-ui.min.js" ); ?>" type="text/javascript"></script>
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
<!--<script src="<?php echo base_url($this->config->item("new_theme")."/assets/js/jquery.select-bootstrap.js"); ?>"></script>-->
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

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>
</html>