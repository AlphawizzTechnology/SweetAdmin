<head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"><aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url("img/user2-160x160.jpg"); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php _get_current_user_name($this); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i>  <?php echo $this->lang->line("Online");?></a>
            </div>
          </div>
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <?php echo $this->lang->line("MAIN NAVIGATION");?></li>
            <li class="active treeview">
              <a href="<?php echo site_url("admin/dashboard"); ?>">
                <i class="fab fa-dashcube"></i> <span> <?php echo $this->lang->line("Dashboard");?></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <?php if(_get_current_user_type_id($this)==0){ ?>
            <!--<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Common Settings</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> User Settings</a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo site_url("admin/user_types"); ?>"><i class="fa fa-circle-o"></i> User Types</a></li>
                        
                    </ul>
                </li>
               
              </ul>
             </li>-->
            <li>
              <a href="<?php echo site_url("admin/registers"); ?>">
                <i class="fa fa-users"></i> <span> <?php echo "App Users";?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url("admin/listcategories"); ?>">
                <i class="fa fa-folder-open"></i> <span> <?php echo $this->lang->line("Categories");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url("admin/socity"); ?>">
                <i class="fa fa-building"></i> <span> <?php echo $this->lang->line("Socity");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url("admin/products"); ?>">
                <i class="fab fa-product-hunt"></i> <span> <?php echo $this->lang->line("Products");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-calendar-alt"></i> <span> <?php echo $this->lang->line("Delivery Schedule Hours");?></span><i class="fa fa-angle-left pull-right"></i></small>
              </a>
              <ul class="treeview-menu">
                    <li>
                      <a href="<?php echo site_url("admin/time_slot"); ?>">
                        <i class="fas fa-clock"></i> <span> <?php echo $this->lang->line("Time Slot");?></span> <small class="label pull-right bg-green"></small>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo site_url("admin/closing_hours"); ?>">
                        <i class="fa fa-clock-o"></i> <span> <?php echo $this->lang->line("Closing Hours");?></span> <small class="label pull-right bg-green"></small>
                      </a>
                    </li>
                </ul>
            </li>
            <li>
              <a href="<?php echo site_url("admin/add_purchase"); ?>">
                <i class="fab fa-stack-exchange"></i> <span> <?php echo "Stock Update";?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url("admin/orders"); ?>">
                <i class="fa fa-cart-arrow-down"></i> <span> <?php echo $this->lang->line("Orders_name");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-thumbtack"></i> <span> <?php echo "Store Management";?></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"> 
                        <li><a href="<?php echo site_url("users"); ?>"><i class="fas fa-list-ol"></i>
                         <?php echo "List Store Users";?></a></li>
                        
                        
              </ul>
            </li>
            
            <li>
              <a href="#">
                <i class="fas fa-file-alt"></i> <span> <?php echo $this->lang->line("Pages");?></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                         <li><a href="<?php echo site_url("admin/allpageapp"); ?>"><i class="fas fa-list-ol"></i> <?php echo $this->lang->line("List");?></a></li>
                        
              </ul>
            </li>
            
            <li>
              <a href="<?php echo site_url("admin/declared_rewards"); ?>">
                <i class="fas fa-rupee-sign"></i> <span> <?php echo "Declared Reward Value";?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            
             <li>
              <a href="<?php echo site_url("admin/setting"); ?>">
                <i class="fa fa-cogs"></i> <span> <?php echo $this->lang->line("Order Limit Setting");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li> 
             <li>
              <a href="<?php echo site_url("admin/stock"); ?>">
                <i class="fab fa-stack-overflow"></i> <span> <?php echo $this->lang->line("Stock");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li> 
            <li>
              <a href="<?php echo site_url("admin/notification"); ?>">
                <i class="fa fa-bell"></i> <span> <?php echo $this->lang->line("Notification");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li> 
             <li class="treeview">
              <a href="#">
                <i class="fas fa-images"></i>
                <span> <?php echo $this->lang->line("Slider");?> </span>
                <span class="label label-primary pull-right"></span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url("admin/listslider"); ?>"><i class="fas fa-list-ol"></i><?php echo "  Main Slider";?> </a></li>
                <!--li><a href="<?php echo site_url("admin/addslider"); ?>"><i class="fas fa-plus-square"></i><?php echo $this->lang->line("Add New");?>  </a></li-->
                <li><a href="<?php echo site_url("admin/banner"); ?>"><i class="fa fa-picture-o"></i><?php echo " Secondry Banner";?>  </a></li>
                <li><a href="<?php echo site_url("admin/feature_banner"); ?>"><i class="far fa-image"></i><?php echo "  Featured Brand Banner";?>  </a></li>
              </ul>
            </li>
            <!--li>
              <a href="<?php echo site_url("admin/banner"); ?>">
                <i class="fa fa-picture-o"></i> <span> <?php echo " Secondry Banner";?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li> 
            <li>
              <a href="<?php echo site_url("admin/feature_banner"); ?>">
                <i class="far fa-image"></i> <span> <?php echo "Featured Brand Banner";?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li--> 
            <li>
              <a href="<?php echo site_url("admin/coupons"); ?>">
                <i class="fas fa-copyright" aria-hidden="true"></i> <span> <?php echo $this->lang->line("Coupons");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li> 
            <li>
              <a href="<?php echo site_url("admin/dealofday"); ?>">
                <i class="fab fa-dyalog" aria-hidden="true"></i> <span> <?php echo $this->lang->line("deal");?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li> 
            <!--li>
              <a href="<?php echo site_url("admin/header_categories"); ?>">
                <i class="fa fa-list"></i> <span> <?php echo "Header Categories";?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li--> 
            <li>
              <a href="<?php echo site_url("admin/help"); ?>">
                <i class="fa fa-list-alt"></i> <span> <?php echo "Rise a Ticket";?></span> <small class="label pull-right bg-green"></small>
              </a>
            </li> 
            
            <?php  } ?>
             
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>