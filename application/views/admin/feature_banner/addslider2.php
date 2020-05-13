<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/apple-icon.png"); ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url($this->config->item("new_theme")."/assets/img/favicon.png"); ?>" />
    <title>Admin | Dashboard</title>
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
                                <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('success_req'); ?>
                                <div class="card-content">
                                    <h4 class="card-title">Add Banner</h4>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Slider Title: *</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="slider_title" class="form-control" placeholder="Slider Title" />
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Slider Url</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="emp_fullname" class="form-control" placeholder="Slider Url/Link"/>
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Image: *</label>
                                            <div class="col-md-9">
                                                <legend></legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img width="100%" height="100%" src="">
                                                    </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="slider_img">
                                                            <div class="ripple-container"></div>
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Select Status : *</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <select class="text-input form-control" name="slider_status">
                                                    <option value="1"> <?php echo $this->lang->line("Active");?>  </option>
                                                    <option value="0"> <?php echo $this->lang->line("DeActive");?>  </option>
                                                          
                                                </select>
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Sub Category : *</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                        <select class="text-input form-control" name="sub_cat">
                                                            <option> <?php echo "Select Sub Category"; ?></option>
                                                            <?php  
                                                            echo printCategory(0,0,$this);
                                                            function printCategory($parent,$leval,$th){
                                                            
                                                            $q = $th->db->query("SELECT a.*, Deriv1.count FROM `categories` a  LEFT OUTER JOIN (SELECT `parent`, COUNT(*) AS count FROM `categories` GROUP BY `parent`) Deriv1 ON a.`id` = Deriv1.`parent` WHERE a.`status`=1 and a.`parent`!=0" );
                                                            $rows = $q->result();
                                    
                                                            foreach($rows as $row){
                                                                if ($row->count > 0) {
                                                                        
                                                                            //print_r($row) ;
                                                                            //echo "<option value='$row[id]_$co'>".$node.$row["alias"]."</option>";
                                                                            printRow($row,true);
                                                                            printCategory($row->id, $leval + 1,$th);
                                                                            
                                                                        } elseif ($row->count == 0) {
                                                                            printRow($row,false);
                                                                            //print_r($row);
                                                                        }
                                                                }
                                    
                                                            }
                                                             
                                                            function printRow($d,$bool){
                                                                  
                                                           // foreach($data as $d){
                                                            ?>
                                                            <option value="<?php echo $d->id; ?>" <?php if($d->parent == "0" && $d->leval == "0" && $bool){echo "disabled";} ?> <?php if(isset($_REQUEST["parent"]) && $_REQUEST["parent"]==$d->id){echo "selected"; } ?> ><?php for($i=0; $i<$d->leval; $i++){ echo "_"; } echo $d->title; ?></option>
                                                                
                                                             <?php } ?> 
                                                        </select>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <input type="submit" name="addslider" value="Add Slider" class="btn btn-fill btn-rose" >                                                </div>
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
</script>
</html>