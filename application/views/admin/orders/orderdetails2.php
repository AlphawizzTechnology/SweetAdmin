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
                            <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('success_req'); ?>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Order Detail</h4>
                                    <!--a class="pull-right" href="<?php echo site_url(""); ?>">ADD NEW STORE</a-->
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Order Details</th>
                                                    
                                                    <!--th class="text-center" style="width: 100px;"> <?php echo $this->lang->line("Action");?></th-->
                                                </tr>
                                            </thead>
                                            <!--tfoot>
                                                <tr>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Start Date</th>
                                                    <th class="text-center">Start Time</th>
                                                    <th class="text-center">End Date</th>
                                                    <th class="text-center">End Time</th>
                                                    <th class="text-center">Expire</th>
                                                    <th class="text-center" style="width: 100px;"> <?php echo $this->lang->line("Action");?></th>
                                                </tr>
                                            </tfoot-->
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <table class="table">
                                                            <tr>
                                                                <td valign="top">
                                                                <strong> <?php echo $this->lang->line("Order Id : ");?><?php echo $order->sale_id; ?></strong>
                                                                <br />

                                                                <strong>  <?php echo $this->lang->line("Order Date : ");?><?php echo $order->on_date; ?></strong>
                                                                <br />

                                                                </td>
                                                                <td>
                                                                    <strong> <?php echo $this->lang->line("Delivery Details : ");?></strong><br />
                                                                    <strong>  <?php echo $this->lang->line("Contact : ");?><?php echo $order->user_fullname ; ?>, <br/> Phone : <?php echo $order->user_phone; ?></strong>
                                                                    <br />
                                                                    <strong>  <?php echo $this->lang->line("Address :");?></strong>
                                                                    <address>
                                                                        <?php echo $order->socity_name; ?><br />
                                                                        <?php echo $order->house_no; ?>
                                                                    </address>
                                                                    <br />
                                                                     <?php echo $this->lang->line("Delivery Time :");?> <?php echo $order->delivery_time_from." to ".$order->delivery_time_to; ?></p>
                                                                 </td>
                                                                
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th>Total Price <?php echo $this->config->item("currency");?></th>
                                                </tr>
                                                <?php
                                                    $total_price = 0;
                                                    foreach($order_items as $items){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $items->product_name; ?><br />
                                                            <?php echo $items->unit_value." ".$items->unit. " (".$this->config->item("currency")." $items->price ) "; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $items->qty ; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $items->qty * $items->price;
                                                                $total_price = $total_price + ($items->qty * $items->price);
                                                                 ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                                <tr>
                                                    <td colspan="2"><strong class="pull-right"> <?php echo $this->lang->line("Total :");?></strong></td>
                                                    <td >
                                                        <strong class=""><?php echo $total_price; ?>  <?php echo $this->config->item("currency");?></strong>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2"><strong class="pull-right">Delivery Charges :</strong></td>
                                                    <td >
                                                        <strong class=""><?php echo $order->shipping_charge; ?> <?php echo $this->config->item("currency");?></strong>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2"><strong class="pull-right">Coupon discount :</strong></td>
                                                    <td >
                                                        <strong class=""><?php echo $order->coupon_discount; ?> <?php echo $this->config->item("currency");?></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><strong class="pull-right">Net Total Amount :</strong></td>
                                                    <td >
                                                        <strong class=""><?php echo $net = $total_price + $order->shipping_charge-$order->coupon_discount; ?><?php echo $this->config->item("currency");?> </strong>
                                                    </td>
                                                </tr>
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