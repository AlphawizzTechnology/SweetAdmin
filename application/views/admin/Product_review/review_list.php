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
    <style>
    
    </style>
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
                                    <h4 class="card-title">Products Reviews</h4>  
                                </div>





                                <div class="container">
                                <div class="row">
                                <div class="col-sm-10" id="result" style="display:none;"></div>
                                </div>
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
               
                <h3 class="panel-title">
                    Recent Comments</h3>
                <span class="label label-info">
                    <?php if(!empty($reviews)){ echo count($reviews); } else {echo '0';} ?></span>
            </div>
            <div class="panel-body">
                <ul class="list-group" >
                   <?php 
                     if(!empty($reviews)){ 
                   foreach($reviews as $c) { 
                       
                       ?>
                    <li class="list-group-item">
                        <div class="row">

                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">

                                <div>
                                    <!-- <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                        Google Style Login Page Design Using Bootstrap</a> -->
                                    <div class="mic-info">
                                        By: <a href="#"><?= $c->user_fullname ?></a> <?= $c->time ?>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-12">
                                <div class="comment-text">
                                    <?= $c->comment ?>
                                </div>
                                </div>
                                <div class="action">
                                    <!-- <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button> -->
                                    <?php if($c->approved == 0) { ?>
                                    <button type="button" class="btn btn-success btn-xs approved" id="<?= $c->id ?>" title="Approved" >
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-success btn-xs unapproved" id="<?= $c->id ?>" title="UnApproved" >
                                        <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    <?php } ?>

                                    <a href="<?= base_url() ?>admin/delete_review/<?= $c->id ?>" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                                <div>
                                
                                 <?php if($c->rating ==1) { ?>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                 <?php  } ?>
                                 <?php if($c->rating ==2) { ?>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                 <?php  } ?>
                                 <?php if($c->rating ==3) { ?>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                 <?php  } ?>
                                 <?php if($c->rating ==4) { ?>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-o"></span>
                                 <?php  } ?>
                                 <?php if($c->rating ==5) {
                                   
                                      ?>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                 <?php  } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } } ?>
                    

                   

                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
            </div>
        </div>
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


        $('.approved').click(function(){
            var id = $(this).attr('id');

            $.post("<?= base_url() ?>admin/approve_review/"+id,function(result){
                if(result == 'approved successfully') {
                
                $("#result").css('display','block');
                $('#result').html("<p class='alert alert-success'>"+result+"</p>");
                $('#result').fadeOut(3000); 
                
                
            }
            else {
                $("#result").css('display','block');
                $('#result').html("<p class='alert alert-danger'>"+result+"</p>");
                $('#result').fadeOut(3000);
            }

           
  });
        })




        $('.unapproved').click(function(){
           
            var id = $(this).attr('id');

            $.post("<?= base_url() ?>admin/unapprove_review/"+id,function(result){
                if(result == 'approved successfully') {
                
                $("#result").css('display','block');
                $('#result').html("<p class='alert alert-success'>"+result+"</p>");
                $('#result').fadeOut(3000);
                
                
            }
            else {
                $("#result").css('display','block');
                $('#result').html("<p class='alert alert-danger'>"+result+"</p>");
                $('#result').fadeOut(3000);
            }

           
  });
        })




    });
</script>

</html>