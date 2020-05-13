<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.css"); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.css
    "); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/skins/_all-skins.min.css"); ?>">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php  $this->load->view("admin/common/common_header"); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php  $this->load->view("admin/common/common_sidebar"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                 <section class="content-header">
                    <h1>
                         <?php echo $this->lang->line("coupon_list");?>
                        <small> <?php echo $this->lang->line("Preview");?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("Home");?></a></li>
                        <li><a href="#"> <?php echo $this->lang->line("Coupons");?></a></li>
                        <li class="active"> <?php echo $this->lang->line("coupon_list");?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('success_req'); ?>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"> <?php echo $this->lang->line("coupon_list");?></h3>   
                                    <!--<a class="pull-right" href="<?php echo site_url("admin/addCoupon"); ?>"> <?php echo $this->lang->line("add_coupon");?></a> --> 
                                    <p class="pull-right"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><?= $this->lang->line("add_coupon");?></button></p>
                                </div><!-- /.box-header -->
                                
                               
  
                               <div class="box-body table-responsive">
     
                                <form action="" method="post" enctype="multipart/form-data">

                                    
                                        <div class="form-group">
                                            
                                            <label class=""><?php echo $this->lang->line('nameofcoupon');?>  <span class="text-danger">*</span></label>
                                            
                                            <input type="text" name="coupon_title" class="form-control" value="<?= $coupon['coupon_name']; ?>" placeholder="<?= $this->lang->line('coupon_title');?>"/>
                                            <?php echo form_error('coupon_title'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class=""><?= $this->lang->line('coupon_code');?>  <span class="text-danger">*</span></label>
                                            <input type="text" name="coupon_code" class="form-control" value="<?= $coupon['coupon_code']; ?>" placeholder="<?= $this->lang->line('couponcode');?>"/>
                                            <?php echo form_error('coupon_code'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="" width="100%"><?php echo "validity :";?>  <span class="text-danger">*</span></label>
                                            <input type='text' id='txtDate' name="from" value="<?= $coupon['valid_from']; ?>" placeholder="From"/><input type='text' name="to" value="<?= $coupon['valid_to']; ?>" id='txtDate2' placeholder="To"/>
                                            <?php echo form_error('from'); ?>
                                            <?php echo form_error('to'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class=""><?php echo "Choose Any One :";?> <span class="text-danger">*</span></label>
                                            <select class="text-input form-control" name="product_type" id="type">
                                                <?php if ($coupon['validity_type']=='Product') { ?>
                                                   <option value="<?= $coupon['validity_type']; ?>"><?= $coupon['validity_type']; ?></option>
                                                <option value="Category">Category</option>
                                                <option value="Sub Category">Sub Category</option>
                                               <?php }elseif ($coupon['validity_type']=='Category') {?>
                                                   <option value="<?= $coupon['validity_type']; ?>"><?= $coupon['validity_type']; ?></option>
                                                <option value="Product">Product</option>
                                                <option value="Sub Category">Sub Category</option>
                                              <?php }elseif ($coupon['validity_type']=='Sub Category') {?>
                                                   <option value="<?= $coupon['validity_type']; ?>"><?= $coupon['validity_type']; ?></option>
                                                <option value="Category">Category</option>
                                                <option value="Sub Category">Product</option>
                                              <?php } ?> ?>
                                                
                                            </select>
                                            <?php echo form_error('product_type'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo "Select:";?>  </label>
                                            <input type="text" name="printable_name" value="<?= $coupon['product_name']; ?>" class="form-control" id='id' />
                                            <?php echo form_error('printable_name'); ?>
                                            <div class="well" id="result" style="display:none;"></div>
                                            <p style="color:red;font-size:">Note : Please Select On Which Code Will Be Applicable. </p>
                                        </div>
                                        <div class="form-group"> 
                                        <label class="" width="100%"><?php echo "Discount Type:";?>  </label>
                                            <div class="">
                                                <label>
                                                    
                                                    <input type="radio" name="discount_type" id="optionsRadios1" <?= ($coupon['discount_type']==1) ? "checked" : ""; ?> value="1"/>
                                                    <?php echo "Percentage(%)";?>
                                                    <?php echo form_error('discount_type'); ?>
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="radio" name="discount_type" <?= ($coupon['discount_type']==1) ? "" : "checked";?> id="optionsRadios2" value="0"/>
                                                    <?php echo "Amount ";?>(<i class="fa fa-inr"></i>)

                                                </label>
                                            </div>
                                           
                                        </div>
                                    
                                    
                                        <div class="form-group">
                                            <label class=""><?php echo $this->lang->line("value");?> <span class="text-danger">*</span></label>
                                            <input type="text" name="value" class="form-control" value="<?= $coupon['discount_value'];?>" placeholder="00.00"/>
                                            <?php echo form_error('value'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class=""><?php echo $this->lang->line("cart_value");?> <span class="text-danger">*</span></label>
                                            <input type="text" name="cart_value" class="form-control" value="<?= $coupon['cart_value'];?>"  placeholder="00"/>
                                             <?php echo form_error('cart_value'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class=""><?php echo $this->lang->line("uses_restriction");?> <span class="text-danger">*</span></label>                                           
                                            <input type="text" name="restriction" class="form-control "value="<?= $coupon['uses_restriction'];?>" placeholder="00.00"/>    
                                             <?php echo form_error('restriction'); ?>
                                        </div>
                                    
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="addcatg" value="Edit Coupon" />
                                      
                                    </div>
                               
                                    </div>
                                    </form>
                                  </div>
                                   
                                
                            </div>
                        </div>
                    </div>
                    <!-- Main row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- /.content-wrapper -->
      
      <?php  $this->load->view("admin/common/common_footer"); ?>  

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    

    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jQuery/jQuery-2.1.4.min.js"); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    <script>
      $(function () {
        
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        $("body").on("change",".tgl_checkbox",function(){
            var table = $(this).data("table");
            var status = $(this).data("status");
            var id = $(this).data("id");
            var id_field = $(this).data("idfield");
            var bin=0;
                                         if($(this).is(':checked')){
                                            bin = 1;
                                         }
            $.ajax({
              method: "POST",
              url: "<?php echo site_url("admin/change_status"); ?>",
              data: { table: table, status: status, id : id, id_field : id_field, on_off : bin }
            })
              .done(function( msg ) {
                alert(msg);
              }); 
        });
      });
    </script>
    <script type="text/javascript">  
        $(this).ready( function() {
           
        
            $("#id").autocomplete({  
                
                minLength: 1,  
                source:   
                function(req, add){
                    $("#result").show();

                    var d=[
                    'search='+$("#id").val(),
                    'type='+$("#type").val()
                    ];
                   
                    if($("#type").val()=='Product'){  //start if
                    $.ajax({  
                        url: "<?php echo base_url(); ?>index.php/admin/lookup",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req, 
                        success:      
                        function(data){  
                            $("#result").html(data);
                            if(data.response =="true"){ 
                                
                               $.each(data.message, function(index, element) {
                                  
                                $('#result').append("<p  class='element'"+ " id='location_" + index + "' hrf='" + element.value + "'>" + element.value +"</p>");
                             });  
                                //$("#result").add(data.message);  
                                console.log(data);
                                $(".element").click(function(){
                                $("#result").hide();
                                $("#id").val($(this).attr("hrf"));
                                });
                                
                            }else{
                            $('#result').html($('<p/>').text("No Data Found"));  
                        }   
                        },  
                    });
                }else if($("#type").val()=='Category'){


                    $.ajax({  
                        url: "<?php echo base_url(); ?>index.php/admin/looku",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req, 
                        success:      
                        function(data){  
                            $("#result").html(data);
                            if(data.response =="true"){ 
                                
                               $.each(data.message, function(index, element) {
                                  
                                $('#result').append("<p  class='element'"+ " id='location_" + index + "' hrf='" + element.value + "'>" + element.value +"</p>");
                             });  
                                //$("#result").add(data.message);  
                                console.log(data);
                                $(".element").click(function(){
                                $("#result").hide();
                                $("#id").val($(this).attr("hrf"));
                                });
                                
                            }else{
                            $('#result').html($('<p/>').text("No Data Found"));  
                        }   
                        },  
                    });

                }else if($("#type").val()=='Sub Category'){
                    

                    $.ajax({  
                        url: "<?php echo base_url(); ?>index.php/admin/look",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req, 
                        success:      
                        function(data){  
                            $("#result").html(data);
                            if(data.response =="true"){ 
                                
                               $.each(data.message, function(index, element) {
                                  
                                $('#result').append("<p  class='element'"+ " id='location_" + index + "' hrf='" + element.value + "'>" + element.value +"</p>");
                             });  
                                //$("#result").add(data.message);  
                                console.log(data);
                                $(".element").click(function(){
                                $("#result").hide();
                                $("#id").val($(this).attr("hrf"));
                                });
                                
                            }else{
                            $('#result').html($('<p/>').text("No Data Found"));  
                        }   
                        },  
                    });

                }  //end   //end if
                },  
                     
            });
                
           
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
        
   
  </body>
</html>