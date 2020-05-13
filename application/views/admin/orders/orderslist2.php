<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/apple-icon.png"); ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/favicon.png"); ?>" />
    <title></title>
    <!-- Canonical SEO -->
    <link rel="canonical" href="//www.creative-tim.com/product/material-dashboard-pro" />

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
        <!--sider -->
        <?php  $this->load->view("admin/common/sidebar"); ?>
        
        <div class="main-panel">
            <!--head -->
            <?php  $this->load->view("admin/common/header"); ?>
            <!--content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Orders List</h4>
                                    <!--a class="text-right" href="<?php echo site_url("admin/add_products"); ?>">ADD</a-->
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Order ID</th>
                                                    <th class="text-center">Customer Name</th>
                                                    <th class="text-center">Socity</th>
                                                    <th class="text-center">Customer Phone </th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Order Amount</th>
                                                    <th class="text-center">Store</th>
                                                    <th class="text-center">Total Rewards</th>
                                                    <th class="text-center">Payment Method</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">Order ID</th>
                                                    <th class="text-center">Customer Name</th>
                                                    <th class="text-center">Socity</th>
                                                    <th class="text-center">Customer Phone </th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Order Amount</th>
                                                    <th class="text-center">Store</th>
                                                    <th class="text-center">Total Rewards</th>
                                                    <th class="text-center">Payment Method</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php foreach($today_orders as $order){ ?>
                                                <tr>
                                                    <td><?php echo $order->sale_id; ?></td>
                    <td><?php echo $order->user_fullname; ?></td>
                    <td><?php echo $order->socity_name; ?></td>
                    <td><?php echo $order->user_phone; ?></td>
                    <td><?php echo $order->on_date.'<br>'.date("H:i A", strtotime($order->delivery_time_from))." - ".date("H:i A", strtotime($order->delivery_time_to)); ; ?></td>
                    <td><?php echo $order->total_amount; ?></td>
                    <td><?php echo $order->new_store_id ?></td>
                    <td><?php echo $order->total_rewards; ?></td>
                    <td><?php echo $order->payment_method;; ?></td>
                    <td><?php if($order->status == 0){
                        echo "<span class='label label-default'>Pending</span>";
                    }else if($order->status == 1){
                        echo "<span class='label label-success'>Confirm</span>";
                    }else if($order->status == 2){
                        echo "<span class='label label-info'>Out</span>";
                    }else if($order->status == 3){
                        echo "<span class='label label-danger'>Cancel</span>";
                    }else if($order->status == 4){
                        echo "<span class='label label-info'>complete</span>";
                    } ?>
                    </td>
                    <td><a href="<?php echo site_url("admin/orderdetails/".$order->sale_id); ?>" class="btn btn-success"> <?php echo $this->lang->line("Details");?></a>
                        <div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"> <?php echo $this->lang->line("Action");?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo site_url("admin/cancle_order/".$order->sale_id); ?>"> <?php echo $this->lang->line("Cancel");?></a></li>
        <?php if($order->status == 0){
                        echo "<li><a href='".site_url("admin/confirm_order/".$order->sale_id)."'>Confirm</a></li>";
                    }else if($order->status == 1){
                        echo "<li><a href='".site_url("admin/delivered_order/".$order->sale_id)."'>Out</a></li>";
                    } 
                    else if($order->status == 2){
                        echo "<li><a href='".site_url("admin/delivered_order_complete/".$order->sale_id)."'>Complete</a></li>";
                    } ?>
    <li><a href="<?php echo site_url("admin/delete_order/".$order->sale_id); ?>"> <?php echo $this->lang->line("Delete");?></a></li>
  </ul>
</div>
                    </td>
                </tr>
            <?php
          }
          ?>
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
                    <!-- end row -->
                </div>
            </div>
            <!--footer -->
            <?php  $this->load->view("admin/common/footer"); ?>
        </div>
    </div>
    <!--fixed -->
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
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>

</html>